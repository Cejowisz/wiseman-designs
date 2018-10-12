<template>
    <div class="service-container">
        <div class="top">
            <h1 class="underline">OUR SERVICES</h1>
            <ol type="1">
                <li>T-shirt customizing</li>
                <li>Printing services (Direct Imaging)</li>
                <li>Photography (Indoor & Outdoor)</li>
                <li>Safety signs for companies</li>
                <li>Graphic Designs</li>
                <li>Billboards and stickers</li>
                <li>Ankara Designs</li>
                <li>Branding Services</li>
                <li>General Art Work</li>
                <li>Award Designs</li>
                <li>Souvenir Printing</li>
                <li>Large Format printing</li>
            </ol>
            <h1>WHY YOU SHOULD CHOOSE <br> WISEMAN DESIGNS STUDIO</h1>
            <ul class="why">
                <li>W are creative</li>
                <li>W are reliable</li>
                <li>We deliver on time</li>
                <li>We do not disappoint</li>
                <li>Our products are affordable</li>

            </ul>
        </div>
        <div class="training">
            <h1>TRAINING</h1>
            <p>In Wiseman Designs Studio we believe in training others so that we can
                reach out to the need of the outside world
                with qualified personnel’s who can handle our services to customers without complaints.
            </p>
            <p>
                Any applicant is free to choose from our varieties of Services and undergo
                training for a particular period of time, graduate and then become our staff
                for a period of time to be sure
                you are capable of facing the demands of the outside world.
            </p>
        </div>
    </div>
</template>


<style scoped>
    .service-container{
        background: #1A2462;
        display: grid;
        grid-template: auto auto auto / 55% 45%;
    }
    .top {
        color: #fefefe;
        padding-top: 25px;
        padding-right: 100px;
        padding-left: 25px;
        font-size: 1.2rem;
        grid-template: 1 / 1 / 1 / -1;

    }
    h1, ul, ol{
        margin-bottom: 50px;
    }

    @media(min-width: 552px) {
        .training{
            font-size: 1.2rem;
            padding: 50px;
            align-self: end;
            background: #FFD401;
            /*grid-template-columns: ;*/
            -webkit-clip-path: polygon(7% 0, 100% 0, 100% 100%, 3% 100%);
        }
    }

    @media(max-width: 551px) {
        .service-container{
            grid-template-columns: 100%;
        }
        h1{
            font-size: 1rem;
            padding-top: 50px;
        }
        ul, ol{
            font-size: 14px;
        }
        .training{
            background: #FFD401;
            padding-left: 20px;
            padding-right: 20px;
        }
    }

    .underline:after{
       content: '';
        text
        width: 50%;
        color: red;
        height: 5px;
    }

</style>