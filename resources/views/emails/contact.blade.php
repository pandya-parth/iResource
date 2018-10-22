<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>iResource Management</title>
</head>
<body style="margin: 0; padding: 0;">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="center" style="background: #f5f5f5; padding: 20px 0 20px 0; font-family: Helvetica , Arial, sans-serif; font-size: 16px;">
				<table cellpadding="0" cellspacing="0" width="800" align="center">
					<tr>
						<td style="width: 800px; background: #ffffff;">
							<table cellpadding="0" cellspacing="0" width="100%">
								<tr style="background-color:#007bff">
									<td style="padding: 10px 0px 10px 0px;text-align: center;">
										<a href="{{ url('/') }}" target="_blank">
											<img src="{!! asset('images/logo.png') !!}"> 
										</a>
									</td>
								</tr>
								<tr>
									<td style="padding: 30px 10px 0 10px;">Hi Administartor,</td>
								</tr>
								<tr>
									<td style="padding: 10px;">{{ $data["name"] }} has requested for a demo.</td>
								</tr>
								<tr>
									<td style="padding: 10px;">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="color: #ffffff; background: #007bff; padding: 5px 10px;">DETAILS:</td>
											</tr>
											<tr>
												<td style="padding: 0 0 30px 0;">
													<table cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td style="border: 1px solid #222222; padding: 5px 10px;">		Name: 
															</td>
															<td style="border-top: 1px solid #222222; border-right: 1px solid #222222; border-bottom: 1px solid #222222; padding: 5px 10px;">
															{{ $data["name"] }}
															</td>
														</tr>
														<tr>
															<td style="border-left: 1px solid #222222; border-right: 1px solid #222222; border-bottom: 1px solid #222222; padding: 5px 10px; background: #d9d9d9;">
																Email:
															</td>
															<td style="border-right: 1px solid #222222; border-bottom: 1px solid #222222; padding: 5px 10px; background: #d9d9d9;">
																{{ $data["email"] }}
															</td>
														</tr>
														<tr>
															<td style="border: 1px solid #222222; padding: 5px 10px;">		Phone: 
															</td>
															<td style="border-top: 1px solid #222222; border-right: 1px solid #222222; border-bottom: 1px solid #222222; padding: 5px 10px;">
															{{ $data["phone"] }}
															</td>
														</tr>
														<tr>
															<td style="border: 1px solid #222222; padding: 5px 10px;">		Message: 
															</td>
															<td style="border-top: 1px solid #222222; border-right: 1px solid #222222; border-bottom: 1px solid #222222; padding: 5px 10px;">
																{{ $data["message"] }}
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td style="padding: 0px 0 20px 0;">Thank you</td>
											</tr>
											<tr>
												<td style="padding: 0px 0 10px 0;">
													<strong>iResource Management</strong>
												</td>
											</tr>
											<tr>
												<td style="padding: 0px 0px 0px 0px;">
													<a href="tel:+917940049450" style="text-decoration: none; color: #000;">
														+91-79-40049450
													</a>
												</td>
											</tr>
											<tr>
												<td style="padding: 0px 0 0px 0;">
													<a href="mailto:info@iresource.com" style="text-decoration: none; color: #000;">
														info@iresource.com
													</a>
												</td>
											</tr>
											<tr>
												<td style="padding: 0px 0 20px 0;">
													<a href="https://www.iresource.com/" style="text-decoration: none; color: #000;" target="_blank">
														www.iresource.com
													</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="padding: 10px; background: #007bff; text-align: center; font-size: 16px; color: #ffffff;" align="center">© <?= date('Y'); ?> 
										iResource Management
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
