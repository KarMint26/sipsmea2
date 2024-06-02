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
        trigger: ".title-content",
        start: "top 85%",
    },
});
gsap.from("#see_list_pkl", 1.1, {
    opacity: 0,
    y: 150,
    delay: 1,
    scrollTrigger: {
        trigger: ".about_desc",
        start: "top 85%",
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

// Guide
gsap.from("#guide_title", 1.2, {
    opacity: 0,
    y: 150,
    delay: 0.5,
    scrollTrigger: {
        trigger: "#guide_title",
        start: "top 80%",
    },
});

gsap.from("#desc_time1", 1.2, {
    opacity: 0,
    scale: 0,
    delay: 0.7,
    scrollTrigger: {
        trigger: "#desc_time1",
        start: "top 80%",
    },
});

gsap.from("#desc_time2", 1.2, {
    opacity: 0,
    scale: 0,
    delay: 0.7,
    scrollTrigger: {
        trigger: "#desc_time2",
        start: "top 80%",
    },
});

gsap.from("#desc_time3", 1.2, {
    opacity: 0,
    scale: 0,
    delay: 0.7,
    scrollTrigger: {
        trigger: "#desc_time3",
        start: "top 80%",
    },
});

gsap.from("#desc_time4", 1.2, {
    opacity: 0,
    scale: 0,
    delay: 0.7,
    scrollTrigger: {
        trigger: "#desc_time4",
        start: "top 80%",
    },
});

gsap.from("#guide_content1", 1.2, {
    opacity: 0,
    scale: 0,
    delay: 0.9,
    scrollTrigger: {
        trigger: "#guide_content1",
        start: "top 80%",
    },
});

gsap.from("#guide_content2", 1.2, {
    opacity: 0,
    scale: 0,
    delay: 0.9,
    scrollTrigger: {
        trigger: "#guide_content2",
        start: "top 80%",
    },
});

gsap.from("#guide_content3", 1.2, {
    opacity: 0,
    scale: 0,
    delay: 0.9,
    scrollTrigger: {
        trigger: "#guide_content3",
        start: "top 80%",
    },
});

gsap.from("#guide_content4", 1.2, {
    opacity: 0,
    scale: 0,
    delay: 0.9,
    scrollTrigger: {
        trigger: "#guide_content4",
        start: "top 80%",
    },
});

gsap.from("#line1", 1, {
    opacity: 0,
    y: -150,
    delay: 0.5,
    scrollTrigger: {
        trigger: "#line1",
        start: "top 70%",
    },
});

gsap.from("#line2", 1, {
    opacity: 0,
    y: -150,
    delay: 0.5,
    scrollTrigger: {
        trigger: "#line2",
        start: "top 70%",
    },
});

gsap.from("#line3", 1, {
    opacity: 0,
    y: -150,
    delay: 0.5,
    scrollTrigger: {
        trigger: "#line3",
        start: "top 70%",
    },
});

gsap.from("#line4", 1, {
    opacity: 0,
    y: -150,
    delay: 0.5,
    scrollTrigger: {
        trigger: "#line4",
        start: "top 70%",
    },
});

// List PKL
gsap.from("#list_pkl_title", 1, {
    opacity: 0,
    scale: 0,
    delay: 0.5,
    scrollTrigger: {
        trigger: "#list_pkl_title",
        start: "top 70%",
    },
});

gsap.from(".card", 1, {
    opacity: 0,
    y: 100,
    delay: 0.8,
    scrollTrigger: {
        trigger: ".card",
        start: "top 70%",
    },
});
