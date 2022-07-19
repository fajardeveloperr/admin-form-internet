<div><div>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Customers Sales</h1>
                </div>
                <div class="col-auto">
                        <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input wire:model="search" type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                                    </div>
                                </form>
                            </div><!--//col-->

							    <div class="col-auto">
								    <a class="btn app-btn-secondary" href="#">
									    <svg width="1em" height="1em"  class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
										<path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
										</svg>
									    Download CSV
									</a>
							    </div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->

				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tablist" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" style="width:100%;">
                                        <p>Informasi Data Personal</p>
                                        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                                            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Personal</a>
                                            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Bussiness</a>
                                        </nav>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table app-table-hover mb-0 text-left">
                                                <thead>

                                                    <tr>
                                                        <th class="cell">No</th>
                                                        <th class="cell">Id Pelanggan</th>
                                                        <th class="cell">Nama Lengkap</th>
                                                        <th class="cell">Status</th>
                                                        <th class="cell">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    <tr>
                                                        <td class="cell"></td>
                                                        <td class="cell"></td>
                                                        <td class="cell"></td>     
                                                        <td class="cell">-</td>
                                                      
                                                        <td>
                                                            <a wire:click="#" data-bs-toggle="modal" data-bs-target="#detail-data-modal"  class="btn btn-md btn-success" href="#"><i class="fa-solid fa-eye"></i></a>
                                                            <a data-bs-toggle="modal" data-bs-target="#edit-data-modal"  class="btn btn-md btn-warning" href="#"><i class="fa-solid fa-edit"></i></a>
                                                            <a href="#" wire:click="#"  class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                        </td>
                                                    </tr>

                                                     <!-- Modal edit -->
                                                    <div wire:ignore.self class="modal fade" id="edit-data-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Informasi Data Personal</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="app-card-body">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal view -->
                                                    <div wire:ignore.self class="modal fade" id="detail-data-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content ">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-success" id="exampleModalLongTitle">Informasi Data Personal</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                <div class="modal-body">
                                                                    <div class="pd-20 card-box height-20-p">
                                                                            <ul style="list-style-type: ' ';">
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                        <span class="text-black" style="font-weight: bold">Nama Lengkap :</span>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                    <li class="text-black">
                                                                                        
                                                                                    </li>
                                                                                </div>
                                                                            </div>
                                                                        <br>

                                                                        <div class="row">
                                                                            <div class="col">
                                                                            <span class="text-black" style="font-weight: bold">Email :</span>
                                                                        </div>
                                                                        <div class="col">
                                                                            <li class="text-black">
                                                                                
                                                                            </li>
                                                                        </div>
                                                                    </div>
                                                                <br>

                                                                <div class="row">
                                                                    <div class="col">
                                                                        <span class="text-black" style="font-weight: bold">Alamat Lengkap :</span>
                                                                </div>
                                                                <div class="col">
                                                                    <li class="text-black">
                                                                       
                                                                    </li>
                                                                </div>
                                                            </div>
                                                            <br>

                                                        <div class="row">
                                                            <div class="col">
                                                                <span class="text-black" style="font-weight: bold">No Handphone / WhatsApp :</span>
                                                        </div>
                                                        <div class="col">
                                                            <li class="text-black">
                                                                
                                                            </li>
                                                        </div>
                                                    </div>
                                                <br>

                                            <div class="row">
                                                <div class="col">
                                                    <span class="text-black" style="font-weight: bold">Nomor Identitas :</span>
                                            </div>
                                            <div class="col">
                                                <li class="text-black">
                                                    
                                                </li>
                                            </div>
                                        </div>
                                    <br>

                                <div class="row">
                                    <div class="col">
                                        <span class="text-black" style="font-weight: bold">Status :</span>
                                </div>
                                <div class="col">
                                    <li>
                                        <a wire:click="approved" class="btn btn-md btn-success" href="#"><i class=""></i>Approved</a>
                                        <a class="btn btn-md btn-danger" href="#"><i class=""></i>Rejected</a>
                                    </li>
                                </div>
                            </div>
                        <br>
                     </div>
                            </ul>
                                </div>
                                    </div>
                                        </div>
                                             </div>
                                                </div>
                                                    <td>Maaf Data Tidak Tersedia</td>
                                                </tbody>
                                            </table>
                                        </div><!--//table-responsive-->
                                    </div>
                                </div>
						    </div><!--//app-card-body-->
						</div><!--//app-card-->
						<nav class="app-pagination">
                            <ul class="pagination justify-content-center">
                                {{-- {{ $sales->links() }} --}}
                            </ul>
                        </nav><!--//app-pagination-->
			        </div><!--//tab-pane-->

			        <div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" style="width:100%;">
                                        <p>Informasi Data Bussiness</p>
                                        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                                            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab"
                                               data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Personal</a>

                                            <a class="flex-sm-fill text-sm-center nav-link " id="orders-cancelled-tab" 
                                               data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Bussiness</a>
                                        </nav>
                                    </div>
							    <div class="table-responsive">
							        <table class="table mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">No</th>
												<th class="cell">Id Pelanggan</th>
												<th class="cell">Nama Lengkap</th>
                                                <th class="cell">Status</th>
												<th class="cell">Actions</th>
											</tr>
										</thead>
										<tbody>

											<tr>
												<td class="cell"></td>
												<td class="cell"></td>
												<td class="cell"></td>
                                                <td class="cell">-</td>
                                    
												<td>
                                                    <a class="btn btn-md btn-success" href="#"><i class="fa-solid fa-eye"></i></a>
                                                    <a class="btn btn-md btn-warning" href="#"><i class="fa-solid fa-edit"></i></a>
                                                    <a wire:click="#" class="btn btn-md btn-danger" href="#"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>
    
										</tbody>
									</table>
						        </div><!--//table-responsive-->
						    </div>
                            </div><!--//app-card-body-->
						</div><!--//app-card-->
                        <nav class="app-pagination">
                            <ul class="pagination justify-content-center">
                                {{-- {{ $customers->links() }} --}}
                            </ul>
                        </nav>
			        </div><!--//tab-pane-->
				</div><!--//tab-content-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
    </div>






{{-- Nothing in the world is as soft and yielding as water. --}}
</div>
