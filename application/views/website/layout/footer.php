  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        AOS.init({
            duration: 850,
            once: true,
            offset: 50,
            easing: "ease-out-cubic",
        });
        const navbar = document.getElementById("mainNavbar");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) navbar.classList.add("navbar-scrolled");
            else navbar.classList.remove("navbar-scrolled");
        });
        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener("click", function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute("href"));
                if (target)
                    target.scrollIntoView({ behavior: "smooth", block: "start" });
            });
        });
        new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: { delay: 5200, disableOnInteraction: false },
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3, spaceBetween: 35 },
            },
        });

        const popupWrapper = document.getElementById("adPopupWrapper");
        const ads = [
            {
                brandClass: "brandbar-fdj",
                brandTag: "FDJ · LOTO",
                campaignMain: "Grandma’s Secret",
                extra: '<div class="mt-2 text-muted">Limited edition</div>',
                agency: "BETC",
                logo: "FDJ",
                btnText: "View",
            },
            {
                brandClass: "brandbar-citi",
                brandTag: "citi",
                campaignMain: "We’re Hiring",
                extra:
                    '<div class="mt-2 fw-semibold">Still interested in a role?</div><a href="#" class="apply-now mt-2 d-inline-block">Apply Now</a>',
                agency: "Cabbage Film",
                logo: "Citi",
                btnText: "See roles",
            },
            {
                brandClass: "brandbar-film",
                brandTag: "🎬 REEL",
                campaignMain: "The Filmmaker",
                agency: "Cabbage Film",
                logo: "Cabbage",
                btnText: "Watch",
            },
        ];
        window.closeAd = (idx) =>
            document.getElementById(`popupAd${idx}`)?.remove();
        window.addEventListener("load", () => {
            setTimeout(
                () => popupWrapper.appendChild(createAdCard(1, ads[0])),
                1500,
            );
            setTimeout(
                () => popupWrapper.appendChild(createAdCard(2, ads[1])),
                3800,
            );
        });
        function createAdCard(index, ad) {
            const div = document.createElement("div");
            div.className = "ad-popup-card";
            div.id = `popupAd${index}`;
            div.innerHTML = `<div style="position:relative;"><button class="btn-close-ad" onclick="closeAd(${index})">✕</button><div class="modal-ad-brandbar ${ad.brandClass}" style="height:115px; padding:15px;"><span class="brand-tag">${ad.brandTag}</span></div><div class="modal-ad-body p-3"><div class="campaign-main">${ad.campaignMain}</div>${ad.extra || ""}<div class="agency-line mt-2"><span class="fw-semibold">Agency:</span> ${ad.agency}</div></div><div class="modal-ad-footer px-3 pb-3 d-flex justify-content-between align-items-center"><span class="agency-logo">${ad.logo}</span><button class="btn-ad-simple btn btn-link text-decoration-none p-0" onclick="alert('Campaign clicked')">${ad.btnText} <i class="bi bi-arrow-right"></i></button></div></div>`;
            return div;
        }
    </script>
</body>

</html>