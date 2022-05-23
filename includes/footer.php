</div>
</main>
<div class="modal fade modal-fixed-right modal-theme overflow-hidden" id="settings-modal" tabindex="-1" role="dialog"
    aria-labelledby="settings-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content border-0 vh-100 scrollbar-overlay">
            <div class="modal-header modal-header-settings bg-shape">
                <div class="z-index-1 py-1 light">
                    <h5 class="text-white" id="settings-modal-label"> <span class="fas fa-palette me-2 fs-0"></span>Theme Setting</h5>
                    <p class="mb-0 fs--1 text-white opacity-75"> Welcome To Theme Setting</p>
                </div>
                <button class="btn-close btn-close-white z-index-1 mt-0" type="button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body px-card" id="themeController">
                <h5 class="fs-0">Theme</h5>
                <p class="fs--1"></p>
                <div class="btn-group d-block w-100 btn-group-navbar-style">
                    <div class="row gx-2">
                        <div class="col-6">
                            <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio"
                                value="light" data-theme-control="theme" />
                            <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span
                                    class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                                        src="/assets/img/generic/falcon-mode-default.jpg" alt="" /></span><span
                                    class="label-text">Light</span>
                            </label>
                        </div>
                        <div class="col-6">
                            <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark"
                                data-theme-control="theme" />
                            <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span
                                    class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                                        src="/assets/img/generic/falcon-mode-dark.jpg" alt="" /></span><span
                                    class="label-text"> Dark</span>
                            </label>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-start"><img class="me-2" src="/assets/img/icons/arrows-h.svg"
                            width="20" alt="" />
                        <div class="flex-1">
                            <h5 class="fs-0">Flexible Layout</h5>
                            <p class="fs--1 mb-0"></p>
                        </div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input ms-0" id="mode-fluid" type="checkbox"
                            data-theme-control="isFluid" />
                    </div>
                </div>
                <hr />
                <h5 class="fs-0 d-flex align-items-center">Navigation Bar Colors</h5>
                <p class="fs--1 mb-0"></p>
                <div class="btn-group d-block w-100 btn-group-navbar-style">
                    <div class="row gx-2">
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle"
                                value="transparent" data-theme-control="navbarStyle" />
                            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-transparent">
                                <img class="img-fluid img-prototype" src="/assets/img/generic/default.png"
                                    alt="" /><span class="label-text"> Transparent</span>
                            </label>
                        </div>
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle"
                                value="inverted" data-theme-control="navbarStyle" />
                            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-inverted"> <img
                                    class="img-fluid img-prototype" src="/assets/img/generic/inverted.png"
                                    alt="" /><span class="label-text"> Reverse</span>
                            </label>
                        </div>
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card"
                                data-theme-control="navbarStyle" />
                            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-card"> <img
                                    class="img-fluid img-prototype" src="/assets/img/generic/card.png" alt="" /><span
                                    class="label-text"> Card</span>
                            </label>
                        </div>
                        <div class="col-6">
                            <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle"
                                value="vibrant" data-theme-control="navbarStyle" />
                            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-vibrant"> <img
                                    class="img-fluid img-prototype" src="/assets/img/generic/vibrant.png" alt="" /><span
                                    class="label-text"> Animated</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a class="card setting-toggle" href="#settings-modal" data-bs-toggle="modal">
    <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
        <div class="bg-soft-primary position-relative rounded-start" style="height:34px;width:28px">
            <div class="settings-popover"><span class="ripple"><span
                        class="fa-spin position-absolute all-0 d-flex flex-center"><span
                            class="icon-spin position-absolute all-0 d-flex flex-center"><svg width="20" height="20"
                                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z"
                                    fill="#2A7BE4"></path>
                            </svg></span></span>
                </span>
            </div>
        </div><small class="text-uppercase text-primary fw-bold bg-soft-primary py-2 pe-2 ps-1 rounded-end">Theme Setting</small>
    </div>
</a>

<!-- ===============================================-->

<!--    JavaScripts-->

<!-- ===============================================-->

<script src="/assets/js/all.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="/vendors/tinymce/tinymce.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="/vendors/popper/popper.min.js"></script>
<script src="/vendors/bootstrap/bootstrap.min.js"></script>
<script src="/vendors/anchorjs/anchor.min.js"></script>
<script src="/vendors/is/is.min.js"></script>
<script src="/vendors/fontawesome/all.min.js"></script>
<script src="/vendors/lodash/lodash.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="/vendors/list.js/list.min.js"></script>
<script src="/assets/js/theme.js"></script>
<script src="/assets/js/home.js"></script>
<script src="/vendors/plyr/plyr.polyfilled.min.js"></script>
<link href="/vendors/plyr/plyr.css" rel="stylesheet" />
</body>

</html>
<!-- Footer -->