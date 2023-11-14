<h1 class="h3 mb-3"><strong>Dashboard</strong></h1>

					<div class="row">
						<div class="col-12">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Siswa Laki-Laki</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
													<?php  
														$query = mysqli_query($connect, "SELECT count(*) as total FROM siswa WHERE jk='L' ");
														$data = mysqli_fetch_array($query);
														echo $data['total'];
													?>
												</h1>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Siswa Perempuan</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
													<?php  
														$query = mysqli_query($connect, "SELECT count(*) as total FROM siswa WHERE jk='P' ");
														$data = mysqli_fetch_array($query);
														echo $data['total'];
													?>
												</h1>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Jurusan</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="codesandbox"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
													<?php  
														$query = mysqli_query($connect, "SELECT count(*) as total FROM jurusan");
														$data = mysqli_fetch_array($query);
														echo $data['total'];
													?>
												</h1>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Kelas</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="airplay"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">
													<?php  
														$query = mysqli_query($connect, "SELECT count(*) as total FROM kelas");
														$data = mysqli_fetch_array($query);
														echo $data['total'];
													?>
												</h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>