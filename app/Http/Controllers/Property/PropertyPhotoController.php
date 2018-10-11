<?php

namespace App\Http\Controllers\Property;

use App\Models\PropertyPhoto;
use App\Models\PropertyPhotoDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\File;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PropertyPhotoController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function store(Request $request)
    {
        $photo = new PropertyPhoto;
        $photo->property_id = $request->propertyId;
        $photo->save();

        $decodedPhotos = json_decode($request->photos, true);

        $photos = [];
        $image = '';
        foreach ($decodedPhotos as $key => $item) {
            if (preg_match('@data:image/(png|jpeg|gif|svg\+xml);@', $decodedPhotos[$key]['file'])) {
                list($filename, $mime_type) = $this->decodeBinaryBase64($decodedPhotos[$key]['file']);

//                $image = Storage::putFileAs('/storage/property', new File($filename), time() . '-' . $key . $this->guessExtension($mime_type));
//                $image = Storage::url(new File($filename), time() . '-' . $key . $this->guessExtension($mime_type));
                  $image = Storage::putFile('public/properties', new File($filename));

//                $image = Storage::url($decodedPhotos[$key]['file']->store('public/property'));
            }

            $photos[] = new PropertyPhotoDetail([
//                'path' => $decodedPhotos[$key]['file'],
                'path' => $image,
                'name' => $decodedPhotos[$key]['name'],
//                'is_main' => $decodedPhotos[$key]['name'], TODO later to be included.
            ]);
        }

        if($photo->photoDetails()->saveMany($photos)) {
            $allProperty = new PropertyController();
            return response($allProperty->index(), 201);
        }
        return response('not saved', 500);
    }

    private function decodeBinaryBase64($data) {
        // Get the image data type and content.
        list($type, $data) = explode(';', $data, 2);
        list(, $type) = explode(':', $type);
        list(, $data) = explode(',', $data, 2);

        // Save the image in temporary folder.
        $tmpfile = tempnam(sys_get_temp_dir(), 'binary');
        file_put_contents($tmpfile, base64_decode($data));
        return array($tmpfile, $type);
    }

    private function guessExtension($mime_type) {
        // Determine extension by mime-type.
        switch ($mime_type) {
            case 'image/jpeg':
                $ext = '.jpg';
                break;
            case 'image/png':
                $ext = '.png';
                break;
            case 'image/gif':
                $ext = '.gif';
                break;
            case 'image/svg+xml':
                $ext = '.svg';
                break;
            case 'video/mp4':
                $ext = '.mp4';
                break;
            case 'video/mov':
                $ext = '.mov';
                break;
            default:
                $ext = '';
        }
        return $ext;
    }
}
