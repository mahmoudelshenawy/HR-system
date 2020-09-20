<div class="main-wrapper">
<div class="sidebar" id="sidebar" style="background-color: #34444c ; ">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu" >
						<ul >

							<li class="menu-title">
								<span>Main</span>
							</li>
                            <li class="submenu">
                                <a href="{{url('/home')}}"><i class="la la-dashboard"></i> <span> {{__('nav.Dashboard')}}</span> <span class="menu-title"></span></a>
                            </li>

                            <li class="menu-title">
								<span>Users</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-cube"></i> <span> {{__('nav.users')}}</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
		                        <li class="{{ Request::is('users') ? 'active' : '' }}">
                                    <a  href="{{ url('users') }}">{{__('nav.users')}}</a>
                                </li>
                                 </ul>
							</li>
                            <li class="menu-title">
                                <span>{{__('nav.business_setup')}}</span>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-cogs"></i> <span> {{__('nav.business_setup')}}</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li class="{{ Request::is('business-setup/business-type') ? 'active' : '' }}">
                                        <a  href="{{ url('/business-setup/business-type') }}">{{__('nav.business_type')}}</a>
                                    </li>
                                    <li class="submenu" class="{{ Request::has('business-setup') ? 'active' : '' }}">
                                        <a href="#"><span> {{__('nav.business_branch_menu')}}</span> <span class="menu-arrow"></span></a>
                                        <ul style="display: none;">
                                            <li class="{{ Request::is('business-setup/business-branch') ? 'active' : '' }}">
                                                <a  href="{{ url('/business-setup/business-branch') }}">{{__('nav.branch')}}</a>
                                            </li>
                                            <li class="{{ Request::is('business-setup/business-administration') ? 'active' : '' }}">
                                                <a  href="{{url('/business-setup/business-administration')}}">{{__('nav.administrations')}}</a>
                                            </li>
                                            <li class="{{ Request::is('business-setup/business-department') ? 'active' : '' }}">
                                                <a  href="{{url('/business-setup/business-department')}}">{{__('nav.departments')}}</a>
                                            </li>
                                            <li class="{{ Request::is('business-setup/business-job') ? 'active' : '' }}">
                                                <a  href="{{url('/business-setup/business-job')}}">{{__('nav.jobs')}}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('/business-setup/guarantor') ? 'active' : '' }}" href="{{ url('/business-setup/guarantor') }}">{{__('nav.guarantors')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('/business-setup/contract-type') ? 'active' : '' }}" href="{{ url('/business-setup/contract-type') }}">{{__('nav.contract_type')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('/business-setup/bank-data') ? 'active' : '' }}" href="{{ url('/business-setup/bank-data') }}">{{__('nav.banks')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('/business-setup/medical-insurance-data') ? 'active' : '' }}" href="{{ url('/business-setup/medical-insurance-data') }}">{{__('nav.medical_insurance')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('business-setup/custodys-type') ? 'active' : '' }}" href="{{ url('/business-setup/custodys-type') }}">{{__('nav.custady_type')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <!-----------------   business set up  menue   ------------>
                            <li class="menu-title">
                                <span>{{__('employee.employees')}}</span>
                            </li>
                            <li class="submenu">
                                <a href="#" class="noti-dot"><i class="la la-user"></i> <span> {{__('employee.employees')}}</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('employees') ? 'active' : '' }}" href="{{ url('employees') }}">{{__('nav.all_employees')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('employees/month-attendance-time') ? 'active' : '' }}" href="{{ route('monthly_attendance_time')  }}">{{__('nav.monthly_attendance_time')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('employees/companions') ? 'active' : '' }}" href="{{ url('employees/companions') }}">{{__('nav.companions')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('employees/custodys') ? 'active' : '' }}" href="{{ url('employees/custodys') }}">{{__('nav.custodys')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('employees/loans') ? 'active' : '' }}" href="{{ url('employees/loans') }}">{{__('employee.loans')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('employees/resignations') ? 'active' : '' }}" href="{{ url('employees/resignations') }}">{{__('employee.resignations')}}</a>
                                    </li>
                                    <li>
                                        <a  href="#">{{__('حركه التنقلات ')}}</a>
                                    </li>
                                    <li>
                                        <a  href="#">{{__('الترقيات ')}}</a>
                                    </li>
                                    <li>
                                        <a  href="#">{{__('انهاء خدمه ')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="#"><i class="la la-calendar-check-o"></i> <span> {{__('الحضور')}}</span> <span class="menu-arrow"></span></a>
                            </li>
                            <li class="">
                                <a href="#"><i class="la la-calendar"></i> <span> {{__('الأجازات')}}</span> <span class="menu-arrow"></span></a>
                            </li>


	                	</ul>
	            	</div>
                </div>
</div>
</div>


