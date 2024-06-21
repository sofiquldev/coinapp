$(document).ready(function() {
var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon"),
    themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");
"dark" === localStorage.getItem("color-theme") ||
(!("color-theme" in localStorage) &&
    window.matchMedia("(prefers-color-scheme: dark)").matches)
    ? (themeToggleLightIcon.classList.remove("hidden"),
        document.documentElement.classList.add("dark"))
    : (themeToggleDarkIcon.classList.remove("hidden"),
        document.documentElement.classList.remove("dark"));
var themeToggleBtn = document.getElementById("theme-toggle");
themeToggleBtn.addEventListener("click", function () {
    themeToggleDarkIcon.classList.toggle("hidden"),
        themeToggleLightIcon.classList.toggle("hidden"),
        localStorage.getItem("color-theme")
            ? "light" === localStorage.getItem("color-theme")
                ? (document.documentElement.classList.add("dark"),
                    localStorage.setItem("color-theme", "dark"))
                : (document.documentElement.classList.remove("dark"),
                    localStorage.setItem("color-theme", "light"))
            : document.documentElement.classList.contains("dark")
            ? (document.documentElement.classList.remove("dark"),
                localStorage.setItem("color-theme", "light"))
            : (document.documentElement.classList.add("dark"),
                localStorage.setItem("color-theme", "dark"));
});
const btn = document.querySelector("button.mobile-menu-button"),
    menu = document.querySelector(".mobile-menu"),
    btnClose = document.querySelector(".navbar-toggle-close");
btn.addEventListener("click", () => {
    menu.classList.remove("hidden"), menu.classList.add("open");
}),
    btnClose.addEventListener("click", () => {
        menu.classList.add("hidden"), menu.classList.remove("open");
    });
const date = new Date();
let year = date.getFullYear();
if (
    ((document.getElementById("date").innerHTML = year),
    window.addEventListener("scroll", function () {
        var e = window.pageYOffset;
        let t = document.getElementById("top-nav");
        100 <= e
            ? (document
                    .getElementById("mainnavigationBar")
                    .classList.add("nav-sticky"),
                t &&
                    (t.classList.add("scale-y-0", "origin-top"),
                    t.classList.remove("scale-y-100")))
            : (document
                    .getElementById("mainnavigationBar")
                    .classList.remove("nav-sticky"),
                t &&
                    (t.classList.remove("scale-y-0", "origin-top"),
                    t.classList.add("scale-y-100", "origin-top")));
    }),
    null != document.querySelector("#clients"))
) {
    const c = document.documentElement,
        d = getComputedStyle(c).getPropertyValue(
            "--marquee-elements-displayed"
        ),
        e = document.querySelector(".marquee-content");
    c.style.setProperty("--marquee-elements", e.children.length);
    for (let t = 0; t < d; t++) e.appendChild(e.children[t].cloneNode(!0));
}
let section_counter = document.querySelector("#counter"),
    counters = document.querySelectorAll(".counter");
if (section_counter) {
    let e = new IntersectionObserver(
        (e, t) => {
            var [e] = e;
            e.isIntersecting &&
                (counters.forEach((n, e) => {
                    n.innerHTML = "0";
                    const a = () => {
                        var e = +n.getAttribute("data-value"),
                            t = +n.innerHTML;
                        t < e
                            ? ((n.innerHTML = `${Math.ceil(t + e / 5e3)}`),
                                setTimeout(a, 1))
                            : (n.innerHTML = e);
                    };
                    a(),
                        n.parentElement.style.animation
                            ? (n.parentElement.style.animation = "")
                            : (n.parentElement.style.animation = `slide-up 0.3s ease forwards ${
                                    e / counters.length + 1.5
                                }s`);
                }),
                t.unobserve(section_counter));
        },
        { root: null, threshold: 1 }
    );
    e.observe(section_counter);
}
let trusted_counter = document.querySelector("#counter_trusted"),
    trusted_counters = document.querySelectorAll(".counterTrusted");
if (trusted_counter) {
    let e = new IntersectionObserver(
        (e, t) => {
            var [e] = e;
            e.isIntersecting &&
                (trusted_counters.forEach((n, e) => {
                    n.innerHTML = "0";
                    const a = () => {
                        var e = +n.getAttribute("data-value"),
                            t = +n.innerHTML;
                        t < e
                            ? ((n.innerHTML = `${Math.ceil(t + e / 5e3)}`),
                                setTimeout(a, 1))
                            : (n.innerHTML = e);
                    };
                    a(),
                        n.parentElement.style.animation
                            ? (n.parentElement.style.animation = "")
                            : (n.parentElement.style.animation = `slide-up 0.3s ease forwards ${
                                    e / trusted_counters.length + 1.5
                                }s`);
                }),
                t.unobserve(trusted_counter));
        },
        { root: null, threshold: 1 }
    );
    e.observe(trusted_counter);
}
document.querySelectorAll(".faq-header").forEach((n) => {
    n.addEventListener("click", (e) => {
        let t = n.nextElementSibling;
        if (!n.classList.contains("collapsing")) {
            if (n.classList.contains("open"))
                (t.classList = "faq-body collapsing"),
                    setTimeout(() => {
                        t.style.height = "0px";
                    }, 1),
                    setTimeout(() => {
                        (t.classList = "faq-body close"), (t.style.height = "");
                    }, 300);
            else {
                t.style.display = "block";
                let e = t.clientHeight;
                setTimeout(() => {
                    (t.style.height = e + "px"), (t.style.display = "");
                }, 1),
                    (t.classList = "faq-body collapsing"),
                    setTimeout(() => {
                        t.classList = "faq-body close open";
                    }, 300);
            }
            n.classList.toggle("open");
        }
    });
});
var checkBox = document.getElementById("priceCheck");
function check() {
    for (
        var e = document.getElementsByClassName("price-month"),
            t = document.getElementsByClassName("price-year"),
            n = 0;
        n < e.length;
        n++
    )
        !1 === checkBox.checked
            ? ((e[n].style.display = "block"), (t[n].style.display = "none"))
            : !0 === checkBox.checked &&
                ((e[n].style.display = "none"), (t[n].style.display = "block"));
}
check(), checkBox && checkBox.addEventListener("click", check);
const testimoial = new Swiper("#testionial", {
        loop: !0,
        spaceBetween: 45,
        autoplay: { delay: 2500, disableOnInteraction: !1 },
        pagination: { el: ".swiper-pagination", clickable: !0 },
        breakpoints: {
            640: { slidesPerView: 1, spaceBetween: 0 },
            768: { slidesPerView: 2, spaceBetween: 45 },
            1024: { slidesPerView: 3, spaceBetween: 45 },
        },
    }),
    bloglFeature = new Swiper("#blog-feature", {
        loop: !0,
        slidesPerView: 1,
        spaceBetween: 45,
        autoplay: { delay: 2500, disableOnInteraction: !1 },
        pagination: { el: ".swiper-pagination", clickable: !0 },
    });
let faqTabs = document.querySelectorAll("ul.faq-tabs > li");
function myTabClicks(e) {
    for (let e = 0; e < faqTabs.length; e++)
        faqTabs[e].classList.remove("tabActive");
    let t = e.currentTarget;
    t.classList.add("tabActive"), e.preventDefault();
    let n = document.querySelectorAll(".tab-pane");
    for (let e = 0; e < n.length; e++) n[e].classList.remove("tabActive");
    let a = e.target;
    e = a.getAttribute("href");
    let o = document.querySelector(e);
    o.classList.add("tabActive");
}
for (let e = 0; e < faqTabs.length; e++)
    faqTabs[e].addEventListener("click", myTabClicks);
Fancybox.bind("[data-fancybox]", {}),
    gsap.registerPlugin(MotionPathPlugin),
    gsap.set("#rect, #rect-2, #rect-3, #rect-4, #rect-5, #rect-6", {
        opacity: 1,
    }),
    gsap.from("#rect", {
        motionPath: {
            path: "#path",
            autoRotate: !0,
            align: "#path",
            alignOrigin: [0.5, 0.5],
        },
        duration: 2,
        ease: "none",
        repeat: -1,
        repeatDelay: 0,
    }),
    gsap.from("#rect-2", {
        motionPath: {
            path: "#path-2",
            autoRotate: !0,
            align: "#path-2",
            alignOrigin: [0.5, 0.5],
        },
        duration: 2,
        ease: "none",
        repeat: -1,
        repeatDelay: 0,
    }),
    gsap.from("#rect-3", {
        motionPath: {
            path: "#path-3",
            autoRotate: !0,
            align: "#path-3",
            alignOrigin: [0.5, 0.5],
        },
        duration: 2,
        ease: "none",
        repeat: -1,
        repeatDelay: 0,
    }),
    gsap.from("#rect-4", {
        motionPath: {
            path: "#path-4",
            autoRotate: !0,
            align: "#path-4",
            alignOrigin: [0.5, 0.5],
        },
        duration: 2,
        ease: "none",
        repeat: -1,
        repeatDelay: 0,
    }),
    gsap.from("#rect-5", {
        motionPath: {
            path: "#path-5",
            autoRotate: !0,
            align: "#path-5",
            alignOrigin: [0.5, 0.5],
        },
        duration: 2,
        ease: "none",
        repeat: -1,
        repeatDelay: 0,
    }),
    gsap.from("#rect-6", {
        motionPath: {
            path: "#path-6",
            autoRotate: !0,
            align: "#path-6",
            alignOrigin: [0.5, 0.5],
        },
        duration: 2,
        ease: "none",
        repeat: -1,
        repeatDelay: 0,
    });
let modal = document.getElementById("modal"),
    modalOpenBtn = document.getElementById("open-btn"),
    modalCloseBtn = document.getElementById("ok-btn");
if (
    ((modalOpenBtn.onclick = function () {
        modal.style.display = "flex";
    }),
    (modalCloseBtn.onclick = function () {
        modal.style.display = "none";
    }),
    (window.onclick = function (e) {
        e.target == modal && (modal.style.display = "none");
    }),
    AOS.init({
        disable: function () {
            return window.innerWidth < 800;
        },
    }),
    null != document.querySelector("#scene"))
) {
    let e = document.getElementById("scene");
    function parallax(a) {
        this.querySelectorAll(".parallax-effect").forEach((e) => {
            var t = e.getAttribute("parallax-value"),
                n = (e.offsetWidth - a.pageX * t) / 90,
                t = (e.offsetWidth - a.pageY * t) / 90;
            e.style.cssText = `transform: translateX(${n}px) translateY(${t}px); transition-duration: 0.1s;`;
        });
    }
    e.addEventListener("mousemove", parallax);
}


// Cripto Table
// Your API key
const apiKey = '353192f0-1697-4343-8a35-34fdb4f6d43f';

// API endpoint
const url = 'https://api.coincap.io/v2/assets';

// Previous data storage
let previousData = [];

// Function to format numbers
function formatNumber(num) {
    if (num >= 1e12) return (num / 1e12).toFixed(2) + ' T'; // Trillion
    if (num >= 1e9) return (num / 1e9).toFixed(2) + ' B';   // Billion
    if (num >= 1e6) return (num / 1e6).toFixed(2) + ' M';   // Million
    if (num >= 1e3) return (num / 1e3).toFixed(2) + ' K';   // Thousand
    return num.toFixed(2);                                  // Less than Thousand
}
function isEqual(a, b) {
    return a==b
}
// Function to fetch and display the data
function fetchCryptoData() {
    $.ajax({
        url: url,
        headers: {
            'Authorization': 'Bearer ' + apiKey
        },
        success: function(response) {
            const assets = response.data;
            const tbody = $('#crypto-table tbody');

            let dataChanged = false; // Flag to track if data has changed

            assets.forEach(asset => {
                const existingRow = tbody.find(`tr[data-id="${asset.id}"]`);
                const symbol = asset.symbol.toLowerCase();
                const iconUrl = `https://assets.coincap.io/assets/icons/${symbol}@2x.png`;
                const change = parseFloat(asset.changePercent24Hr).toFixed(2);

                const newData = {
                    priceUsd: `$${formatNumber(parseFloat(asset.priceUsd))}`,
                    marketCapUsd: `$${formatNumber(parseFloat(asset.marketCapUsd))}`,
                    supply: `$${formatNumber(parseFloat(asset.supply))}`,
                    volumeUsd24Hr: `$${formatNumber(parseFloat(asset.volumeUsd24Hr))}`,
                    changePercent24Hr: change
                };

                const existingData = existingRow.data('asset');

                if (!existingData || !isEqual(existingData, newData)) {
                    dataChanged = true;

                    if (existingRow.length > 0) {
                        // Update only changed fields
                        if (existingData.priceUsd !== newData.priceUsd) {
                            existingRow.find('.coin-price').text(newData.priceUsd);
                        }
                        if (existingData.marketCapUsd !== newData.marketCapUsd) {
                            existingRow.find('.coin-market-cap').text(newData.marketCapUsd);
                        }
                        if (existingData.supply !== newData.supply) {
                            existingRow.find('.coin-supply').text(newData.supply);
                        }
                        if (existingData.volumeUsd24Hr !== newData.volumeUsd24Hr) {
                            existingRow.find('.coin-volume').text(newData.volumeUsd24Hr);
                        }
                        if (existingData.changePercent24Hr !== newData.changePercent24Hr) {
                            const changeElement = existingRow.find('.coin-change');
                            changeElement.text(newData.changePercent24Hr);
                            changeElement.removeClass('color-red color-green').addClass(Number(newData.changePercent24Hr) < 0 ? 'color-red' : 'color-green');
                        }

                        // Update data attribute
                        existingRow.data('asset', newData);

                    } else {
                        // Add new row
                        const row = $('<tr></tr>').attr('data-id', asset.id).data('asset', newData);

                        row.append(`<td class="text-center">${asset.rank}</td>`);
                        row.append(`<td class="coin-name" title="${asset.name}"><img src="${iconUrl}" alt="${asset.name}"> ${asset.symbol}</td>`);
                        row.append(`<td class="coin-price text-center">${formatNumber(parseFloat(asset.priceUsd))}</td>`);
                        row.append(`<td class="text-center coin-market-cap">${formatNumber(parseFloat(asset.marketCapUsd))}</td>`);
                        row.append(`<td class="text-center coin-supply">${formatNumber(parseFloat(asset.supply))}</td>`);
                        row.append(`<td class="text-center coin-volume">${formatNumber(parseFloat(asset.volumeUsd24Hr))}</td>`);
                        row.append(`<td class="text-center coin-change ${Number(change) < 0 ? 'color-red': 'color-green'}">${change}</td>`);

                        tbody.append(row);
                    }
                }
            });

            // Reinitialize DataTable if there's a change
            if (dataChanged) {
                if ($.fn.DataTable.isDataTable('#crypto-table')) {
                    $('#crypto-table').DataTable().draw();
                } else {
                    $('#crypto-table').DataTable({
                        columnDefs: [
                            { width: '150px', targets: 1 } // Set static width for the "Name" column
                        ],
                        autoWidth: false // Allow other columns to adjust automatically
                    });
                }
            }
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}

// Fetch data on page load
// fetchCryptoData();
// setInterval(fetchCryptoData, 15000); // Update only when there's a change

})
