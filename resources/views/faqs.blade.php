@extends("layouts/master")

@section("title","FAQs Page")

@section("content")
    <section class="bg-white text-dark">
        <div class="container text-center">
            <div class="text-center mt-5">
                <h1 class="display-5 mt-2">FAQs</h1>
                <p class="lead text-muted">Find answers to the most frequently asked questions.</p>
            </div>
        </div>
    </section>
    <section>
        <div class="accordion my-lg-5" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" id="payment" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    What payment methods do you accept?
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>We accept a variety of payment methods, including major credit cards (Visa, MasterCard, American Express), PayPal, and Apple Pay. You can choose the payment option that suits you best during the checkout process.</p>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" id="tracking" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    How can I track my order?
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>You can easily track your order by logging into your account and visiting the "Order Status" section. There, you'll find real-time updates on the status of your order, including shipping and delivery details. Additionally, you will receive email notifications with tracking information as your order progresses.</p>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" id="return-exchange" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    What is your return and exchange policy?
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>We have a hassle-free return and exchange policy. If you're not satisfied with your purchase, you can return it within 30 days of delivery for a full refund or exchange. Please visit our "Returns and Refunds" page for more details and instructions.</p>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" id="warranty" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Are your products covered by a warranty?
                </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Yes, all of our tech products come with a manufacturer's warranty. The duration of the warranty may vary depending on the product. You can find warranty information on the product page, and we recommend registering your product for warranty coverage.</p>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" id="international-shipping" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Do you offer international shipping?
                </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Yes, we offer international shipping to many countries. During the checkout process, you can select your shipping destination, and the available shipping options and costs will be displayed. Please note that customs fees and import duties may apply, and it's the responsibility of the recipient to cover these charges.</p>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection