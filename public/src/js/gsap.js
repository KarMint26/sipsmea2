gsap.registerPlugin(ScrollTrigger);

// Beranda
gsap.from("#welcome", 1.2, {
    opacity: 0,
    x: -150,
    delay: 0.5,
    scrollTrigger: {
        trigger: "#welcome",
        start: "top 90%",
    },
});
gsap.from("#desc_landing", 1.2, {
    opacity: 0,
    x: -150,
    delay: 0.8,
    scrollTrigger: {
        trigger: "#desc_landing",
        start: "top 90%",
    },
});
gsap.from("#landing_btn", 1.2, {
    opacity: 0,
    x: -150,
    delay: 1,
    scrollTrigger: {
        trigger: "#landing_btn",
        start: "top 90%",
    },
});
gsap.from("#img_landing", 1.2, {
    opacity: 0,
    y: 150,
    delay: 0.8,
    scrollTrigger: {
        trigger: "#img_landingn",
        start: "top 90%",
    },
});

// Features
gsap.from(".title-features", 1.2, {
    opacity: 0,
    y: 150,
    delay: 0.7,
    scrollTrigger: {
        trigger: ".title-features",
        start: "top 70%",
    },
});

gsap.from(".box-grid", 1.1, {
    opacity: 0,
    y: 150,
    delay: 1,
    scrollTrigger: {
        trigger: ".title-features",
        start: "top 70%",
    },
});

// About
gsap.from("#hero_about", 1.2, {
    opacity: 0,
    y: 150,
    delay: 0.7,
    scrollTrigger: {
        trigger: "#hero_about",
        start: "top 70%",
    },
});
gsap.from(".title-content", 1.1, {
    opacity: 0,
    y: 150,
    delay: 0.8,
    scrollTrigger: {
        trigger: "#hero_about",
        start: "top 70%",
    },
});
gsap.from(".about_desc", 1.1, {
    opacity: 0,
    y: 150,
    delay: 0.9,
    scrollTrigger: {
        trigger: ".about_desc",
        start: "top 70%",
    },
});
gsap.from("#see_list_pkl", 1.1, {
    opacity: 0,
    y: 150,
    delay: 1,
    scrollTrigger: {
        trigger: ".about_desc",
        start: "top 70%",
    },
});

// FAQ
gsap.from(".faq-hero", 1.1, {
    opacity: 0,
    y: 150,
    delay: 0.5,
    scrollTrigger: {
        trigger: ".faq-hero",
        start: "top 70%",
    },
});
gsap.from(".faq-title", 1.2, {
    opacity: 0,
    x: -150,
    delay: 0.5,
    scrollTrigger: {
        trigger: ".faq-title",
        start: "top 70%",
    },
});
gsap.from(".faq-desc", 1.2, {
    opacity: 0,
    x: -150,
    delay: 1,
    scrollTrigger: {
        trigger: ".faq-title",
        start: "top 70%",
    },
});
gsap.from(".accordion", 1.2, {
    opacity: 0,
    x: -150,
    delay: 1.2,
    scrollTrigger: {
        trigger: ".faq-title",
        start: "top 70%",
    },
});
