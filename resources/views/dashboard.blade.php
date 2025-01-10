<x-dashborad-layout title="dashborad">
    <x-slot:head>
                    <h1><i class="fa fa-home"></i> لوحة التحكم</h1>
    </x-slot:head>
<div class="row"> 
 <div class="col-md-6">
    <div class="row">
        <div class="col-md-6 col-lg-5">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>مشرفين</h4>
                    <p><b>{{$admins}}</b></p>
                </div>
            </div>
         </div> 
         <div class="col-md-6 col-lg-5">
             <div class="widget-small primary coloured-icon"><i class="icon fa-solid fa-list fa-3x"></i>
                 <div class="info">
                     <h4>اقسام</h4>
                     <p><b>{{$categories}}</b></p>
                 </div>
             </div>
         </div>
         <div class="col-md-6 col-lg-5">
             <div class="widget-small info coloured-icon"><i class="icon fa-solid fa-tag fa-3x"></i>
                 <div class="info">
                     <h4>وسوم</h4>
                     <p><b>{{$tags}}</b></p>
                 </div>
             </div>
         </div>
         <div class="col-md-6 col-lg-5">
             <div class="widget-small primary coloured-icon"><i class="icon fa-solid fa-registered fa-3x"></i>
                 <div class="info">
                     <h4>علامات تجارية</h4>
                     <p><b>{{$brands}}</b></p>
                 </div>
             </div>
         </div>
         <div class="col-md-6 col-lg-5">
             <div class="widget-small info coloured-icon"><i class="icon fa-solid fa-circle-question fa-3x"></i>
                 <div class="info">
                     <h4>أسئلة شائعة</h4>
                     <p><b>{{$faqs}}</b></p>
                 </div>
             </div>
         </div>
         <div class="col-md-6 col-lg-5">
             <div class="widget-small primary coloured-icon"><i class="icon fa-brands fa-product-hunt fa-3x"></i>
                 <div class="info">
                     <h4>منتجات</h4>
                     <p><b>{{$products}}</b></p>
                 </div>
             </div>
         </div>
         <div class="col-md-6 col-lg-5">
             <div class="widget-small danger coloured-icon"><i class="icon fa-solid fa-bell fa-3x"></i>
                 <div class="info">
                     <h4>طلبات</h4>
                     <p><b>{{$order}}</b></p>
                 </div>
             </div>
         </div>
        </div></div>
    <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">Bar Chart</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
          </div>
        </div>
      </div>
</div>
@push('scripts')
<script type="text/javascript" src="{{asset('dashbord_style/js/plugins/chart.js')}}"></script>
    <script>
            var data = {
      	labels: ["يناير", "فبراير", "مارس", "ابرل", "ماي",'جان','جولاي','اغسطس','سبتمبر','اكتوبر','نومبر','ديسبمر'],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56, 81, 56, 81, 56, 81, 56, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86, 81, 56, 81, 56, 81, 56, 56]
      		}
      	]
      };
      var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);
    </script>

@endpush
    </x-dashborad-layout>