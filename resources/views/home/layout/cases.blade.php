<div class="container py-5 d-none d-md-block" id="custom-cards">
    <div class="row py-2 py-md-4 justify-content-center">
        <div class="col-9">
            <h2 class="h1 lh-sm fw-semibold">How can I use Secretic?</h2>
        </div>
    </div>
    <div class="row py-2 py-md-4 justify-content-center">
        <div class="col-3">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                 style="background: url('{{ asset('assets/unsplash-photo-1.jpg') }}') center;">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-1 mt-3 mb-4 lh-1 fw-bold">
                        {{ __('home.cases.card_1_title') }}
                    </h3>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="d-flex align-items-center ms-auto">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#geo-fill"/>
                            </svg>
                            <small>Business</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#calendar3"/>
                            </svg>
                            <small>42 likes</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                 style="background: url('{{ asset('assets/unsplash-photo-2.jpg') }}') center;">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-1 mt-3 mb-4 lh-1 fw-bold">
                        {{ __('home.cases.card_2_title') }}
                    </h3>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="d-flex align-items-center ms-auto">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#geo-fill"/>
                            </svg>
                            <small>Social</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#calendar3"/>
                            </svg>
                            <small>27 likes</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                 style="background: url('{{ asset('assets/unsplash-photo-3.jpg') }}') center;">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                    <h3 class="pt-1 mt-3 mb-4 lh-1 fw-bold">
                        {{ __('home.cases.card_3_title') }}
                    </h3>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="d-flex align-items-center ms-auto">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#geo-fill"/>
                            </svg>
                            <small>Personal</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#calendar3"/>
                            </svg>
                            <small>13 likes</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
