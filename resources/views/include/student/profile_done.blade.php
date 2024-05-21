<div class="page-content">
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                       <h4>
                        <i class="icon-home"></i> <span class="font-weight-semibold"></span>Welcome to Visa World Wide Admission (Student Panel) <br>
                        </span>Counselor Name: <?php echo $counselor_name->counselor_name; ?>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="font-weight:bold;text-align:center;"><h3>Student Profile Show</h3></h5>
                                <hr>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{url('student_document_store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <table class="table table-bordered">
                                            @include('.include.student.show.home.general_information')
                                            @include('.include.student.show.home.educational_background')
                                            @include('.include.student.show.home.test_score')
                                            @include('.include.student.show.home.background_information')
                                            @include('.include.student.show.home.upload_document')
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
