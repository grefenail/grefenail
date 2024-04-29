
<template>
<div class="absolute inset-0" style="background-color: bisque">
    <img class="absolute inset-0 w-full h-full object-cover" :src="backgroundPipe" alt="workers"/>

    <div class=" absolute top-1/2 lg:top-1/2 left-1/2 text-center transform -translate-x-1/2 -translate-y-1/2 mt-8 lg:mt-0" style="width: 80%;" >
        <Logo :source='"../images/pettytransparent.png"' :customClass='"w-[150px] sm:w-[250px]"'/>
        <h1 class="text-[20px] md:text-[30px] lg:text-[40px] font-bold" style="color: #C75859">Coming Soon!</h1>
        <p class="text-[14px] md:text-[17px] lg:text-[20px] mt-4 sm:mt-10 font-bold" style="color: rgb(123, 94, 57)">We are currently working on the website. Please check back later.</p>

        <div class="flex flex-row items-center justify-center mt-2 sm:mt-5">
            <p class="sm:mr-6 mr-2 font-bold sm:text-base text-sm" style="color: #C75859; ">FOLLOW US ON</p>
            <a href="#" class="sm:mr-4 mr-2"><FontAwesomeIcon :icon="facebookIcon" class="text-[24px]" style="color: #1877F2" /></a>
            <a href="#" class=""><FontAwesomeIcon :icon="instagramIcon" class="instagram text-[19px] text-white p-[3px] rounded-lg" /></a>  
        </div>
    </div>

    <div class="worker1 image-container">
        <img class="worker" :src="worker" alt="workers"/>
        <img class="hand" :src="drillhand" alt="hand"/>
    </div>
    <div class="worker2 image-container">
        <img class="worker" :src="worker" alt="workers"/>
        <img class="hand" :src="drillhand" alt="hand"/>
    </div>
    <div class="worker3 image-container">
        <img class="worker" :src="worker" alt="workers"/>
        <img class="hand" :src="drillhand" alt="hand"/>
    </div>
    <div class="worker4 image-container">
        <img class="worker" :src="worker" alt="workers"/>
        <img class="hand4" :src="hammerhand" alt="hand"/>
    </div>
    <div class="worker5 image-container">
        <img class="worker" :src="worker" alt="workers"/>
        <img class="hand5" :src="hammerhand" alt="hand"/>
    </div>
    <div class="worker6 image-container">
        <img class="worker" :src="worker" alt="workers"/>
        <img class="hand6" :src="hammerhand" alt="hand"/>
    </div>

    
    <div class="runners image-container">
        <div class="movers image-container">
            <div class="movers-wrapper">
                <div class="runner-body">
                    <img class="runner-couple" :src="robotrunner" alt="runner-couple">
                </div>
                
                <div class="wheelies">
                    <img class="wheel" :src="wheel" alt="wheel">
                    <img class="wheel2" :src="wheel" alt="wheel">
                </div>
                
            </div>
        </div>
       
        <div class="stayer">
            <img class="bridge" :src="bridge" alt="r-bridge">
        </div>
        
    </div>

    <div class="runners image-container2">
        <div class="movers image-container2">
            <div class="movers-wrapper2">
                <div class="runner-body2">
                    <img class="runner-couple2" :src="robotrunner" alt="runner-couple">
                </div>
                
                <div class="wheelies2">
                    <img class="wheel3" :src="wheel" alt="wheel">
                    <img class="wheel4" :src="wheel" alt="wheel">
                </div>
                
            </div>
        </div>
       
        <div class="stayer2">
            <img class="bridge2" :src="bridge" alt="r-bridge">
        </div>
        
    </div>
</div>
</template>

<script setup>
    import Logo from "@/Components/navbar/Logo.vue";

    const backgroundPipe = "../images/comingSoonImages/Pipes2.png";
    const worker = "../images/comingSoonImages/Robot L-up F-F2-f.png"
    const drillhand = "../images/comingSoonImages/r-drill-hand.png"
    const hammerhand = "../images/comingSoonImages/r-hammer-hand1.png"
    const robotrunner = "../images/comingSoonImages/robot-runners.png"
    const wheel = "../images/comingSoonImages/r-wheel.png"
    const bridge = "../images/comingSoonImages/r-bridge.png"

    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { faFacebook, faInstagram } from '@fortawesome/free-brands-svg-icons'

    const facebookIcon = faFacebook;
    const instagramIcon = faInstagram;
</script>

<style scoped>

    .instagram {
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%); 
        background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);    
    }

    /* images - pipes*/
    .pipes {
        height: auto;
        max-width: 100%;
        z-index: -1;
        transform: translatez(50%);
        left: 0%;
        top: 0%;
        background-size: cover; /* Cover the entire screen */
        background-repeat: repeat-y; /* Repeat vertically if needed */
    }

    /*workers*/
    @keyframes armAnimation {
        100%, 0% {
        transform: rotate(50deg);
        }
        50% {
        transform: rotate(90deg);
        }
    }
    @keyframes b-armAnimation {
        100%, 0% {
        transform: rotate(70deg);
        }
        50% {
        transform: rotate(10deg);
        }
    }
    @keyframes rotater {
        from {
        transform: rotate(0deg);
        animation-timing-function: linear;
        }
        to {
        transform: rotate(360deg);
        animation-timing-function: linear;
        }
    }
    @keyframes b-rotater {
        from {
        transform: rotate(360deg);
        animation-timing-function: linear;
        }
        to {
        transform: rotate(0deg);
        animation-timing-function: linear;
        }
    }
    @keyframes moveAcross {
        0% {
        transform: translateX(50%);
        animation-timing-function: linear;
        }
        100% {
        transform: translateX(-100%);
        animation-timing-function: linear;
        }
    }
    @keyframes b-moveAcross {
        0% {
        transform: translateX(-100%);
        animation-timing-function: linear;
        }
        100% {
        transform: translateX(50%);
        animation-timing-function: linear;
        }
    }

  
    .worker1.image-container {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    position: fixed;
    bottom: -7%;
    right: -7%;
    width: 25%;
    height: auto;
    transform: scaleX(-1);
    }
    
    .worker1.image-container img {
    max-width: 100%;
    height: auto;
    }
    
    .hand {
    position: absolute;
    bottom: 44%;
    right: 48%;
    width: 20%;
    height: auto;
    animation: b-armAnimation 7s infinite;
    }
      
.worker2.image-container {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    position: fixed;
    bottom: 30%;
    left: -7%;
    width: 25%;
    height: auto;
  }
  
  .worker2.image-container img {
    max-width: 100%;
    height: auto;
  }
  
  .hand2 {
    position: absolute;
    bottom: 55%;
    right: 48%;
    width: 20%;
    height: auto;
    animation: b-armAnimation 10s infinite;
  }
  
  .worker3.image-container {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    position: fixed;
    bottom: 40%;
    right: -7%;
    width: 25%;
    height: auto;
    transform: scaleX(-1);
  }
  
  .worker3.image-container img {
    max-width: 100%;
    height: auto;
  }
  
  .hand3 {
    position: absolute;
    bottom: 70%;
    right: 48%;
    width: 20%;
    height: auto;
    animation: b-armAnimation 7s infinite;
  }
  
  .worker4.image-container {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    position: fixed;
    bottom: 5%;
    right: 20%;
    width: 25%;
    height: auto;
    transform: scaleX();
  }
  
  .worker4.image-container img {
    max-width: 100%;
    height: auto;
  }
  
  .hand4 {
    position: absolute;
    bottom: 44%;
    right: 48%;
    width: 20%;
    height: auto;
    animation: b-armAnimation 8s infinite;
  }
  
  .worker5.image-container {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    position: fixed;
    top: 14%;
    width: 25%;
    height: auto;
    transform: scaleX(-1);
  }
  
  .worker5.image-container img {
    max-width: 100%;
    height: auto;
  }
  
  .hand5 {
    position: absolute;
    bottom: 45%;
    right: 47.5%;
    width: 20%;
    height: auto;
    animation: b-armAnimation 18s infinite;
  }
  
  .worker6.image-container {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    position: fixed;
    bottom: 77%;
    right: 10%;
    width: 25%;
    height: auto;
    transform: scaleX(-1);
  }
  
  .worker6.image-container img {
    max-width: 100%;
    height: auto;
  }
  
  .hand6 {
    position: absolute;
    bottom: 45%;
    right: 47.5%;
    width: 20%;
    height: auto;
    animation: b-armAnimation 11s infinite;
  }

  
.runners.image-container {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    position: fixed;
    bottom: 60%;
    right: 0%;
    width: 100%;
    height: auto;
  }
  
  .movers.image-container {
    position: absolute;
    bottom: 7%;
    right: 0%;
    width: 100%;
    height: 60%;
    animation: moveAcross 20s infinite;
  }
  
  .movers-wrapper {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    width: 100%;
    height: 50%;
  }
  
  .wheelies {
    position: absolute;
    width: 100%;
    bottom: 17%;
  }
  
  .runners.image-container img {
    max-width: 100%;
    height: auto;
  }
  
  .bridge {
    display: block;
    margin: 0 auto;
    width: 100%;
    height: auto;
    transform: translateY(40%);
  }
  
  .runner-couple {
    position: absolute;
    width: 30%;
    bottom: -10%;
    right: 20%;
    height: auto;
  }
  
  .wheel {
    position: absolute;
    bottom: 17%;
    right: 30.54%;
    width: 8%;
    height: auto;
    animation: b-rotater 7s infinite;
  }
  
  .wheel2 {
    position: absolute;
    bottom: 17%;
    right: 24.1%;
    width: 8%;
    height: auto;
    animation: b-rotater 7s infinite;
  }
  
  .runners.image-container2 {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    position: fixed;
    bottom: 10%;
    right: 0%;
    width: 100%;
    height: auto;
    transform: scaleX(-1);
    z-index: 2;
  }
  
  .movers.image-container2 {
    position: absolute;
    bottom: 7%;
    right: 0%;
    width: 100%;
    height: 60%;
    animation: moveAcross 20s infinite;
  }
  
  .movers-wrapper2 {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    width: 100%;
    height: 50%;
  }
  
  .wheelies2 {
    position: absolute;
    width: 100%;
    bottom: 17%;
  }
  
  .runners.image-container2 img {
    max-width: 100%;
    height: auto;
  }
  
  .bridge2 {
    display: block;
    margin: 0 auto;
    width: 100%;
    height: auto;
    transform: translateY(40%);
  }
  
  .runner-couple2 {
    position: absolute;
    width: 30%;
    bottom: -10%;
    right: 20%;
    height: auto;
  }
  
  .wheel3 {
    position: absolute;
    bottom: 17%;
    right: 30.54%;
    width: 8%;
    height: auto;
    animation: b-rotater 7s infinite;
  }
  
  .wheel4 {
    position: absolute;
    bottom: 17%;
    right: 24.1%;
    width: 8%;
    height: auto;
    animation: b-rotater 7s infinite;
  }/*# sourceMappingURL=soon.css.map */
  
</style>