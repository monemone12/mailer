<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>메일발송기</title>

		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<!-- PAGE LEVEL SCRIPTS -->
	</head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="form-mailer" method="post" action="mailpost.php" enctype="multipart/form-data">
            <h3>메일발송기</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
        						<label class="title">아이디</label>
        						<input type="text" name="user_id" value="" class="form-control required" >
        				</div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
        						<label class="title">비밀번호</label>
        						<input type="text" name="user_password" value="" class="form-control required">
        				</div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
        						<label class="title">보내는사람이름</label>
        						<input type="text" name="sender_name" value="" class="form-control required" >
        				</div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
        						<label class="title">받는사람 리스트</label>
        						<textarea name="to" class="form-control"></textarea>
                    <p>*메일사이의 구분자는 ; 로 입력해주세요.</p>
        				</div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
        						<label class="title">메일 제목</label>
        						<input type="text" name="title" value="" class="form-control required" >
        				</div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <label class="title">첨부파일</label>
                <div class="">
                  <input type="file" class="form-control" name="send_file">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
        						<label class="title">내용</label>
        						<textarea class="form-control" name="contents"></textarea>
        				</div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-primary">보내기</button>
              </div>
            </div>





          </form>
        </div>
      </div>
    </div>

  </body>
  </html>
