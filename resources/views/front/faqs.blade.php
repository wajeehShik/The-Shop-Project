<x-front-layout>
    
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs direction_rtl">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">أسئلة الشائعة</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> صفحة الرئيسية</a></li>
                        <li>أسئلة الشائعة</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Faq Area -->
    <section class="faq section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>الاسئلة الشائعة؟ </h2>
                        <p>نجاوب علي كثير  من الاسئلة التي تخطر في بالك في حال لم تجد سؤال لا تترد في التوصل معنا
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$loop->iteration}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{$loop->iteration}}" aria-expanded="false" aria-controls="collapse{{$loop->iteration}}">
                                    <span class="title">{{$faq->title}}</span><i class="lni lni-plus"></i>
                                </button>
                            </h2>
                            <div id="collapse{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading{{$loop->iteration}}"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{!!$faq->body!!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
  
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Faq Area -->
</x-front-layout>