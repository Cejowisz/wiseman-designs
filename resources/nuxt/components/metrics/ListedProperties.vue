<template>
    <div class="metrics">
       <div>
           <p>Properties Listed</p>
       </div>
        <div>
            <p>Viewed your Property</p>
        </div>
    </div>
</template>

<style>
    .metrics{
        display: grid;
        grid-template-columns: auto auto;
        grid-gap: 18px;
    }
    .metrics div{
        height: 120px;
        border: 1px solid red;
        padding: 10px;
    }
</style>