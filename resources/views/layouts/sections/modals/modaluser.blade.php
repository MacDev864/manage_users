<div class="modal fade" id="basicModal" data-frmStatus="" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="labelmodal"><span id="modal-title"></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="name" class="form-control" placeholder="Enter Name" >
                        <label for="name">Name</label>
                      </div>
                    </div>
                    <input type="text" id="id" hidden  class="form-control" placeholder="" >

                  </div>
                  <div class="row">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="lastname" class="form-control" placeholder="Enter Lastname" >
                        <label for="lastname">Lastname</label>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col mb-4 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="username" class="form-control" placeholder="Enter Username" >
                        <label for="username">Username</label>
                      </div>
                    </div>

                  </div>
                  <div class="row g-2">
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                        <input type="email" id="email" class="form-control" placeholder="xxxx@xxx.xx" >
                        <label for="email">Email</label>
                      </div>
                    </div>
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                      <select id="user_level" class="select2 form-select">
                            <option value="">Select role</option>
                            <!-- <option value="0">superadmin</option> -->
                            <option value="1">admin</option>
                            <option value="2">subadmin</option>
                            <option value="3">user</option>
                      </select>
                        <label for="user_level">Role</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary btn-submit">Save changes</button>
                </div>
              </div>
            </div>
          </div>
