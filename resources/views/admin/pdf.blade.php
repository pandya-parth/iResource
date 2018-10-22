<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<title>iResource</title>
<style type="text/css">

@page {
	margin: 2cm;
}

body {
  font-family: sans-serif;
	margin: 2cm 0;
	text-align: justify;
}
.table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
        padding-top: 20px;
    }
    th{
      text-align: left;
    }
    td{
      text-align: left;
      border: 1px solid #000000;
    }

#header,
#footer {
  position: fixed;
  left: 0;
	right: 0;
	color: #aaa;
	font-size: 0.9em;
}

#header {
  top: 0;
	border-bottom: 0.1pt solid #aaa;
}

#footer {
  bottom: 0;
  border-top: 0.1pt solid #aaa;
}

#header table,
#footer table {
	width: 100%;
	border: 0;
}
#header td{
  padding: 0;
	width: 100%;
  border: 0;
}
#footer td{
  width: 50%;
  border: 0;
}
.page-number {
  text-align: center;
}

.page-number:before {
  content: "Page " counter(page);
  color: #333737;
}
hr {
  page-break-after: always;
  border: 0;
}

</style>

</head>

<body>

<div id="header">
  <table>
    <tr>
      <td style="text-align: center;"><img src="{!! public_path().'/images/iresource.png' !!}"></td>
    </tr>
  </table>
</div>

<div id="footer">
  <table>
    <tr>
      <td style="text-align: left;"><img src="{!! public_path().'/images/logo-krishaweb.png' !!}"></td>
      <td><div class="page-number"></div></td>
    </tr>
  </table>
</div>
<div style="padding-left: 20px; padding-right: 22px;">
    <h2 style="text-align: center; padding-bottom: 0px;">Auto Genereat Id's</h2>
    <table class="table" cellpadding="0" cellspacing="0" border="1">
      <thead>
        <tr>
          <th style="padding: 10px;">#</th>
          <th style="padding: 10px;">Email</th>
          <th style="padding: 10px;">Password</th>
          <th style="padding: 10px;">Candidate Name</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $key => $user)
        <tr>
          <td style="padding: 10px;">{!! $key + 1 !!}</td>
          <td style="padding: 10px;">{!! $user->email !!}</td>
          <td style="padding: 10px;">{!! $pswds[$key] !!}</td>
          <td style="padding: 10px;"></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  </body>
</html>
