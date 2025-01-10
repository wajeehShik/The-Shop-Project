<style>
  .yellow {
            color: #ffc107; /* اللون الأصفر للنجوم المملوءة */
        }
</style>
@for($i=1;$i<=5;$i++)
@if($ratting>=$i)
<i class="lni lni-star-filled yellow"></i>
@else
<i class="lni lni-star"></i>
@endif
@endfor