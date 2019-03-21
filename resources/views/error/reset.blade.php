@if(session()->has('false'))
    <div class="container" style="background:#fff !important;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="info" class="alert alert-danger danger-dismissible fade show hidden" role="alert">
                    {{session('false')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="color:#812c3b">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @php
        session() -> forget('false')
    @endphp
@elseif(session()->has('true'))
    <div class="container" style="background:#fff !important;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="info" class="alert alert-success success-dismissible fade show hidden" role="alert">
                    {{session('true')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @php
        session() -> forget('true')
    @endphp
@elseif(session()->has('warning'))
    <div class="container" style="background:#fff !important;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="info" class="alert alert-warning warning-dismissible fade show hidden" role="alert">
                    {{session('warning')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @php
        session() -> forget('true')
    @endphp
@endif
<script>
    $(document).ready(function(){
        $("#info").fadeIn();
        setTimeout (function(){
            $("#info").fadeOut('slow');
        }, 5000);
    });
</script>
