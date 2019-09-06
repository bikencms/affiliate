@extends('layouts.app')

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li class="active">FAQ</li>
        </ol>
        <br>
        <h4>
            CÁC CÂU HỎI THƯỜNG GẶP
        </h4>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tất cả các câu Hỏi</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-group" id="accordion">
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                <div class="panel box box-primary">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                RFX là gì?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="box-body">
                                            RFX: chúng tôi tạm viết tắt theo từ Robot & Forex, với nghĩa là dự án giao dịch ngoại hối bằng phần mềm (robot) 
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-danger">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                Dự án RFX hoạt động trong lĩnh vực nào?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="box-body">
                                            RFX cung cấp giải pháp giao dịch ngoại hối bằng phần mềm (robot), khi sử dụng Robot nhà đầu tư không cần phải học hỏi cách giao dịch nữa. Mọi hoạt động giao dịch, trao đổi sản phẩm đều được thực hiện tự động bằng robot của chúng tôi.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                Tại sao lại lựa chọn sàn giao dịch Exness?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="box-body">
                                            RFX đặt lợi ích của nhà đầu tư lên trên hết, với phương châm phục vụ tốt nhất cho cộng đồng. Chúng tôi chọn Exness vì sàn này được xếp hạng Top 5 của Thế giới. Các tiêu chí mà chúng tôi lựa chọn là:
- Có giấy phép hoạt động đúng lĩnh vực
- Có thâm niên hoạt động trên 10 năm
- Phí giao dịch thấp
- Tính thanh khoản rất cao
- Cung cấp VPS (máy chủ ảo) hoàn toàn miễn phí cho mọi khách hàng của RFX
- Nạp và rút tiền hầu như tức thì.

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
    </section>
@endsection
