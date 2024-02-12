@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js" integrity="sha512-lC8vSUSlXWqh7A/F+EUS3l77bdlj+rGMN4NB5XFAHnTR3jQtg4ibZccWpuSSIdPoPUlUxtnGktLyrWcDhG8RvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.css" integrity="sha512-zKvhCkM8b3JMULax/MlTkNk4gQwMbY8CqpDQC74/n7H6UK3HOZA/mO/fvjhVlh0V/E6PCrp4U6Lw6pnueS9HCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="bg-gradient-danger pb-8 pt-5 pt-md-6">
</div>

  <!-- Page content -->
  <div class="container-fluid mt--6 pb-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Settings Table</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <tbody class="list">
                <!-- Default switch -->
                <p class="px-4 py-2">
                    <span class="mr-2">Maintainence Mode</span>
                    <input id="toggle" type="checkbox">
                </p>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.footers.auth')
  </div>

<script>
    $(document).ready(function(){
        var toggle = new Switchery(document.getElementById('toggle'));
        //Checked if maintenance mode is on or not
        var isMaintenanceMode = {!! json_encode(app()->isDownForMaintenance()) !!};
        toggle.setPosition(isMaintenanceMode);

        //Toggle for ajax change of maintenance mode
        toggle.element.addEventListener('change', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('maintenance.toggle') }}",
                dataType: "json",
                success: function (data) {
                    console.log(data.message);
                    $('.hidewheninmaintenence').toggle( {!!app()->isDownForMaintenance() !!} );
                }
            });
        })
    })
</script>

@endsection
