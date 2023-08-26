@auth

      <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
        <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
          <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>

      <span class="fs-5 fw-semibold">{{auth()->user()->name}}</span>
        </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                  Dashboard
                </button>

              </li>
          <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
              Requests
            </button>
            <div class="collapse show" id="home-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="{{ url('deposits') }}" class="link-dark rounded">Deposit</a></li>
                <li><a href="#" class="link-dark rounded">Withdraw</a></li>

              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
              Developer
            </button>
            <div class="collapse" id="dashboard-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="{{ route('developer.deposit') }}" class="link-dark rounded">Deposit</a></li>
                <li><a href="{{ route('developer.withdraw') }}" class="link-dark rounded">Withdraw</a></li>
                <!-- <li><a href="#" class="link-dark rounded">Wallet & Coin</a></li>
                <li><a href="#" class="link-dark rounded">Card Payment</a></li> -->
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
              Report
            </button>

          </li>

        </ul>
      </div>

      @endauth