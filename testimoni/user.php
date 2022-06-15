<!-- include bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="bootstrap.min.css" />

<!-- include font awesome -->
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- include slick -->
<link rel="stylesheet" type="text/css" href="slick.css" />
<link rel="stylesheet" type="text/css" href="slick-theme.css" />

<!-- include vue js -->
<script src="vue.min.js"></script>

<div class="container" id="testimonialApp" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Testimonials</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="items">

                <div class="card" v-for="(testimonial, index) in testimonials">
                    <div class="card-body">
                        <h4 class="card-title">
                            <img src="https://img.icons8.com/ultraviolet/40/000000/quote-left.png" />
                        </h4>

                        <div class="template-demo">
                            <p>
                                <span v-text="testimonial.comment"></span>

                                <span class="show-more-text" v-on:click="loadMoreContent" v-bind:data-index="index">show
                                    more</span>
                            </p>
                        </div>

                        <h4 class="card-title">
                            <img src="https://img.icons8.com/ultraviolet/40/000000/quote-right.png"
                                style="margin-left: auto;" />
                        </h4>

                        <hr />

                        <div class="row">
                            <div class="col-sm-3">
                                <img class="profile-pic" v-bind:src="testimonial.picture" />
                            </div>

                            <div class="col-sm-9">
                                <div class="profile">
                                    <h4 class="cust-name" v-text="testimonial.name"></h4>
                                    <p class="cust-profession" v-text="testimonial.designation"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- include jquery -->
<script src="jquery-3.3.1.min.js"></script>

<script src="slick.min.js"></script>

<!-- include bootstrap JS -->
<script src="bootstrap.min.js"></script>

<!-- your JS code -->
<script src="script.js?v=<?php echo time(); ?>"></script>