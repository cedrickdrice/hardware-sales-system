<div class="fab_holder">
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab compose_fab cust_gradient">
        <i class="material-icons text-white">edit</i>
    </button>
</div>

<div class="mail_actions">
    <div class="row align-items-center">

        <div class="col">
            <div class="d-flex align-items-center">
                <div>
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect ml-3" for="checkbox-1">
                        <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input">
                    </label>
                </div>
                <div>
                    <button id="sort_review" class="mdl-button mdl-js-button mdl-js-ripple-effect mail_filter position-relative">
                        <div class="d-flex align-items-center">
                            <i class="material-icons text_grayish">swap_vert</i><span class="text_grayish">Sort:&nbsp;</span><span id="mail_filtered_txt">All</span>
                        </div>
                    </button>

                    <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect" for="sort_review" id="main_filter_choices">
                        <li class="mdl-menu__item" data-val="All">All</li>
                        <li class="mdl-menu__item" data-val="Read">Read</li>
                        <li class="mdl-menu__item" data-val="Unread">Unread</li>
                        <li class="mdl-menu__item" data-val="Starred">Starred</li>
                        <li class="mdl-menu__item" data-val="Unstarred">Unstarred</li>
                    </ul>
                </div>
                <div class="vert_seperator mx-2"></div>
                <div class="d-flex">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mail_main_actions p-0 d-flex justify-content-center mr-2">
                        <i class="material-icons-new outline-delete mini_icon"></i>
                    </button>
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mail_main_actions p-0 d-flex justify-content-center mr-2">
                        <i class="material-icons-new outline-archive mini_icon"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="d-flex align-items-center justify-content-end">
                <p class="text_grayish mb-0 mr-3">1-50/200</p>
                <div class="mail_nav d-flex">
                    {{-- <button class="mdl-button mdl-js-button mdl-js-ripple-effect px-2">
                        <i class="material-icons">chevron_left</i>
                    </button> --}}
                    {{-- <button class="mdl-button mdl-js-button mdl-js-ripple-effect px-2">
                        <i class="material-icons">chevron_right</i>
                    </button> --}}
                    <button class="cbutton cbutton--effect-sanja">
                        <i class="material-icons">chevron_left</i>
                    </button>
                    <button class="cbutton cbutton--effect-sanja">
                        <i class="material-icons">chevron_right</i>
                    </button>
                </div>
            </div>
        </div>

    </div>{{-- END ROW --}}
</div>{{-- END MAIL ACTIONS --}}

<div class="table-responsive">
    <table class="table-hover w-100">
        <tbody>
            <tr>
                <td>
                    <div class="p-3">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                            <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
                        </label>
                    </div>
                </td>
                <td>
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mail_main_actions p-0 d-flex justify-content-center mr-2" id="mail_star1">
                        <i class="material-icons unstarred mail_star" starred="star" unstarred="star_outline" id="mail_star_i1">star_outline</i>
                    </button>
                    <input type="checkbox" name="" id="mail_star_chkbx_1">
                </td>
                <td>Sender</td>
                <td class="sender_message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                <td>6:51PM</td>
            </tr>
            <tr>
                <td>
                    <div class="p-3">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-3">
                            <input type="checkbox" id="checkbox-3" class="mdl-checkbox__input">
                        </label>
                    </div>
                </td>
                <td>
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mail_main_actions p-0 d-flex justify-content-center mr-2" id="mail_star1">
                        <i class="material-icons unstarred mail_star" starred="star" unstarred="star_outline" id="mail_star_i1">star_outline</i>
                    </button>
                    <input type="checkbox" name="" id="mail_star_chkbx_1">
                </td>
                <td>Sender</td>
                <td class="sender_message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                <td>6:51PM</td>
            </tr>
        </tbody>
    </table>
</div>