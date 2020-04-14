<footer>
	<div class="bg2 p-t-40 p-b-25">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 p-b-20">
					<div class="size-h-3 flex-s-c">
						<a href="index.html">
							<img class="max-s-full" src="images/icons/logo-01.png" alt="LOGO">
						</a>
					</div>

					<div>
						<p class="f1-s-1 cl11 p-b-16" style="text-align: justify">
							Website tt-news là giải pháp tốt để đạt được các mục tiêu trên. Độc giả có thể vào xem các thông tin mới theo các chuyên mục, phản hồi ý kiến của mình ngay khi xem hoặc có thể tìm kiếm các nội dung cũ theo nhiều tiêu chí: nội dung, loại danh mục, ngày đăng, tác giả, …
						</p>

						<p class="f1-s-1 cl11 p-b-16">
							Liên hệ (+1) 96 716 6879
						</p>

						<div class="p-t-15">
							<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
								<span class="fab fa-facebook-f"></span>
							</a>

							<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
								<span class="fab fa-twitter"></span>
							</a>

							<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
								<span class="fab fa-pinterest-p"></span>
							</a>

							<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
								<span class="fab fa-vimeo-v"></span>
							</a>

							<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
								<span class="fab fa-youtube"></span>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-20">
					<div class="size-h-3 flex-s-c">
						<h5 class="f1-m-7 cl0">
							Tin phổ biến
						</h5>
					</div>

					<ul>
						@foreach($trendingList as $tin)

						@if($loop->index===3)
						@break

						@else

						<li class="flex-wr-sb-s p-b-20">
							<a href="/tin/{{$tin->Id_tin}}" class="size-w-4 wrap-pic-w hov1 trans-03">
								<img src="images/{{$tin->Hinhdaidien}}" alt="IMG">
							</a>

							<div class="size-w-5">
								<h6 class="p-b-5">
									<a href="/tin/{{$tin->Id_tin}}" class="f1-s-5 cl11 hov-cl10 trans-03">
										{{$tin->Tieude}}
									</a>
								</h6>

								<span class="f1-s-3 cl6">
									{{$tin->Ngaydangtin}}
								</span>
							</div>
						</li>

						@endif

						@endforeach
					</ul>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-20">
					<div class="size-h-3 flex-s-c">
						<h5 class="f1-m-7 cl0">
							Category
						</h5>
					</div>

					<ul class="m-t--12">
						@foreach($listnhomtin as $nhomtin)

						<li class="how-bor1 p-rl-5 p-tb-10">
							<a href="/nhomtin/{{$nhomtin->Id_nhomtin}}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
								{{$nhomtin->Ten_nhomtin}} ({{count($nhomtin->listLoaitin)}})
							</a>
						</li>

						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>