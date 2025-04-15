<aside class="sidebar navbar-default" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{route ('home')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Pendaftaran</a>
                        </li>

                        <li>
                            <a href=" {{route ('siswa.index')}} "><i class="fa fa-edit fa-fw"></i> Siswa</a>
                        </li>

                        <li>
                            <a href=" {{route ('produk.index')}} "><i class="fa fa-edit fa-fw"></i> produk</a>
                        </li>

                        <li>
                            <a href=" {{route ('kategori.index')}} "><i class="fa fa-edit fa-fw"></i> kategori</a>
                        </li>
                    </ul>
                </div>
            </aside>