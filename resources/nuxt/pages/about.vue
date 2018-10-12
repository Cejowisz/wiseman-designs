<template>
    <div class="about-container">
        <div class="top">
            <h1 class="vision">OUR VISION</h1>
            <p>
                Is to have the biggest printing press in Nigeria and outside Nigeria and also
                to provide quality services that exceeds the expectations of our esteemed customers
            </p>
            <h1 class="mission">OUR MISSION</h1>
            <p>
                Is to provide excellent and comprehensive services to all our customers in a
                friendly environment using qualified and friendly experienced
                personnel and with appropriate measures to sustain customer relationship.
            </p>
        </div>
        <div class="bottom">
            <h1 class="goals">OUR GOALS</h1>
            <p>
                To be the best in Printing & T-shirt customizing and develop a strong base of key customers.
                Increase the assets and investments of the company to support the development of services.
                To build good reputation in the field of Printing business & T-shirt
                customizing and to become a key player in the industry in and outside Africa.

            </p>
        </div>
    </div>
</template>

<style scoped>
    .top {
        background: #FFD401;
        color: #1f1f1f;
    }
    .bottom {
        color: #fefefe;
        background: #1A2462;
    }
    @media(min-width: 943px) {
        .about-container{
            height: 100vh;
            display: grid;
            grid-template-columns: 70% 30%;
            background: url("../assets/img/cj.jpg");
            background-size: cover;
        }
        .top{
            height:500px;
            padding-top: 25px;
            padding-right: 100px;
            padding-left: 25px;
            font-size: 1.2rem;
            -webkit-clip-path: polygon(0 0, 97% 0, 94% 100%, 0 100%);
        }
        .bottom{
            font-size: 1.2rem;
            padding: 50px;
            align-self: end;
            -webkit-clip-path: polygon(7% 0, 100% 0, 100% 100%, 3% 100%);
        }
    }

    @media(max-width: 942px) {

        .top{
            padding: 10px;
        }
        .vision, .mission, .goals{
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .bottom{
            padding: 10px;
        }
    }

</style>