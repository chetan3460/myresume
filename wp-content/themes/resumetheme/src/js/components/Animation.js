import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import SplitType from "split-type";
import { sine, Back } from "gsap";
import { min1024 } from "../utils";
gsap.registerPlugin(ScrollTrigger);

export default class Animation {
  constructor() {
    this.init();
  }

  init = () => {
    this.setDomMap();
    this.bindEvents();
  };

  setDomMap = () => {
    this.window = $(window);
    this.body = $("body");
  };

  bindEvents = () => {
    this.fadeInAnimation();
    this.fadeUpAnimation();
    this.fadeUpStagger();
    this.title_animation();

    this.textRevealAnimation();

    // Function to refresh ScrollTrigger
    const refreshScrollTrigger = () => {
      ScrollTrigger.refresh();
      setTimeout(function () {
        ScrollTrigger.refresh();
      }, 1000);
    };

    // Function to trigger ScrollTrigger.refresh() on window load
    const onWindowFullyLoaded = () => {
      refreshScrollTrigger();
      // Optionally remove the event listener after it's been triggered
      window.removeEventListener("load", onWindowFullyLoaded);
    };
    // Add event listener for window fully loaded event
    window.addEventListener("load", onWindowFullyLoaded);
  };

  // fade In
  fadeInAnimation = () => {
    const fadeIn = document.querySelectorAll(".fade-in");
    if (fadeIn.length) {
      fadeIn.forEach((container) => {
        let fadeInTimeline = gsap.timeline({
          scrollTrigger: {
            trigger: container,
            start: "50px bottom",
          },
        });
        let delay = container.getAttribute("data-delay");
        fadeInTimeline.to(
          container,
          {
            opacity: 1,
            duration: 1,
            onComplete: () => {
              ScrollTrigger.refresh();
            },
          },
          delay
        );
      });
    }
  };

  // fade Up
  fadeUpAnimation = () => {
    const fadeUp = document.querySelectorAll(".fade-up");
    if (fadeUp.length) {
      fadeUp.forEach((container) => {
        let fadeUpTimeline = gsap.timeline({
          scrollTrigger: {
            trigger: container,
            start: "15% 100%",
          },
        });
        let delay = container.getAttribute("data-delay");
        fadeUpTimeline.to(
          container,
          {
            opacity: 1,
            y: 0,
            duration: 1,
          },
          delay
        );
      });
    }



  };


  // fade Up Stagger
  fadeUpStagger = () => {
    const fadeUpWrapper = gsap.utils.toArray(".fade-up-stagger-wrap");

    if (fadeUpWrapper.length) {
      fadeUpWrapper.forEach((fadeUpWrap) => {
        const fadeUp = fadeUpWrap.querySelectorAll(".fade-up-stagger");
        let delay = fadeUpWrap.getAttribute("data-delay");
        gsap.to(fadeUp, {
          scrollTrigger: {
            trigger: fadeUpWrap,
            start: "5% 100%",
          },
          opacity: 1,
          y: 0,
          duration: 1,
          delay: delay,
          stagger: 0.2,
        });
      });
    }
  };


  // Animation gsap 
  title_animation = () => {
    // Animation gsap 
    function title_animation() {
      var tg_var = jQuery('.sec-title-animation');
      if (!tg_var.length) {
        return;
      }
      const quotes = document.querySelectorAll(".sec-title-animation .title-animation");

      quotes.forEach(quote => {

        //Reset if needed
        if (quote.animation) {
          quote.animation.progress(1).kill();
          quote.split.revert();
        }

        var getclass = quote.closest('.sec-title-animation').className;
        var animation = getclass.split('animation-');
        if (animation[1] == "style4") return

        quote.split = new SplitType(quote, {
          type: "lines,words,chars",
          linesClass: "split-line"
        });
        gsap.set(quote, {
          perspective: 400
        });

        if (animation[1] == "style1") {
          gsap.set(quote.split.chars, {
            opacity: 0,
            y: "90%",
            rotateX: "-40deg"
          });
        }
        if (animation[1] == "style2") {
          gsap.set(quote.split.chars, {
            opacity: 0,
            x: "50"
          });
        }
        if (animation[1] == "style3") {
          gsap.set(quote.split.chars, {
            opacity: 0,
          });
        }
        quote.animation = gsap.to(quote.split.chars, {
          scrollTrigger: {
            trigger: quote,
            start: "top 90%",
          },
          x: "0",
          y: "0",
          rotateX: "0",
          opacity: 1,
          duration: 1,
          ease: Back.easeOut,
          stagger: .02
        });
      });
    }
    // ScrollTrigger.addEventListener("refresh", );
    title_animation();
  }


  textRevealAnimation = () => {
    const splitTypes = document.querySelectorAll('.reveal-type');
    splitTypes.forEach((char, i) => {
      const text = new SplitType(char, { types: ['chars', 'words'] });
      gsap.from(text.chars, {
        scrollTrigger: {
          trigger: char,
          start: 'top 80%',
          end: 'top 20%',
          scrub: true,
          markers: false
        },
        opacity: 0.2,
        stagger: 0.1,
      })
    });
  };


  
}
