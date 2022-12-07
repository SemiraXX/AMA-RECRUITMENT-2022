<?php
$notifications = DB::table('tbl_notification_list')
->where('notif_for', '=', session('applicantsession'))
->where('if_viewed', '=', 0)
->get();

$sum = DB::table('tbl_notification_list')
->where('notif_for', '=', session('applicantsession'))
->where('if_viewed', '=', 0)
->get()
->sum('if_viewed');
?>

@if(!$notifications->isEmpty())
<div class="notification-wrapper">
    <div class="circle-notification-wrapper">
        <p class="notif-counter">{{$sum}}</p>
        <h1 class="notif-bell"><i class="fa fa-bell" aria-hidden="true"></i></h1>
    </div>
</div>
@else

@endif




<div class="modal fade" id="notificationmodal">
<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content"  style="background-color:transparent;border:none;">

      <div class="modal-body">
          <div class="exclamation-instruction-wrapper">
          <p class="exclamation"><i class="fa fa-bell" aria-hidden="true"></i></p>
          </div>
          <div class="notification-modal-wrapper">
            <div id="notifdata"></div>

          </div>
      </div>

    </div>
  </div>
</div>

<script src="/script/notif.js"></script>