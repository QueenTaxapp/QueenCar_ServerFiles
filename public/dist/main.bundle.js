webpackJsonp(["main"],{

/***/ "../../../../../src/$$_lazy_route_resource lazy recursive":
/***/ (function(module, exports) {

function webpackEmptyAsyncContext(req) {
	// Here Promise.resolve().then() is used instead of new Promise() to prevent
	// uncatched exception popping up in devtools
	return Promise.resolve().then(function() {
		throw new Error("Cannot find module '" + req + "'.");
	});
}
webpackEmptyAsyncContext.keys = function() { return []; };
webpackEmptyAsyncContext.resolve = webpackEmptyAsyncContext;
module.exports = webpackEmptyAsyncContext;
webpackEmptyAsyncContext.id = "../../../../../src/$$_lazy_route_resource lazy recursive";

/***/ }),

/***/ "../../../../../src/app/Component/components.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ComponentsModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__("../../../common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__footer_footer_component__ = __webpack_require__("../../../../../src/app/Component/footer/footer.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__navbar_navbar_component__ = __webpack_require__("../../../../../src/app/Component/navbar/navbar.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__sidebar_sidebar_component__ = __webpack_require__("../../../../../src/app/Component/sidebar/sidebar.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};






var ComponentsModule = /** @class */ (function () {
    function ComponentsModule() {
    }
    ComponentsModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_2__angular_router__["c" /* RouterModule */],
            ],
            declarations: [
                __WEBPACK_IMPORTED_MODULE_3__footer_footer_component__["a" /* FooterComponent */],
                __WEBPACK_IMPORTED_MODULE_4__navbar_navbar_component__["a" /* NavbarComponent */],
                __WEBPACK_IMPORTED_MODULE_5__sidebar_sidebar_component__["b" /* SidebarComponent */]
            ],
            exports: [
                __WEBPACK_IMPORTED_MODULE_3__footer_footer_component__["a" /* FooterComponent */],
                __WEBPACK_IMPORTED_MODULE_4__navbar_navbar_component__["a" /* NavbarComponent */],
                __WEBPACK_IMPORTED_MODULE_5__sidebar_sidebar_component__["b" /* SidebarComponent */]
            ]
        })
    ], ComponentsModule);
    return ComponentsModule;
}());



/***/ }),

/***/ "../../../../../src/app/Component/footer/footer.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/Component/footer/footer.component.html":
/***/ (function(module, exports) {

module.exports = "<footer>\n    <div class=\"container-fluid\">\n        <p class=\"copyright pull-right\">\n            &copy; {{test | date: 'yyyy'}} <a href=\"http://www.creative-tim.com\">Creative Tim</a>, made with love for a better web\n        </p>\n    </div>\n</footer>\n"

/***/ }),

/***/ "../../../../../src/app/Component/footer/footer.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return FooterComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var FooterComponent = /** @class */ (function () {
    function FooterComponent() {
        this.test = new Date();
    }
    FooterComponent.prototype.ngOnInit = function () {
    };
    FooterComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-footer',
            template: __webpack_require__("../../../../../src/app/Component/footer/footer.component.html"),
            styles: [__webpack_require__("../../../../../src/app/Component/footer/footer.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], FooterComponent);
    return FooterComponent;
}());



/***/ }),

/***/ "../../../../../src/app/Component/navbar/navbar.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/Component/navbar/navbar.component.html":
/***/ (function(module, exports) {

module.exports = "\n<style>\n    .navbar .dropdown-menu li Div:hover {\n        background-color: #9c27b0;\n        color: #FFFFFF;\n        box-shadow: 10px 12px 20px -10px rgba(156, 39, 176, 0.28), 0 4px 20px 0px rgba(0, 0, 0, 0.12), 0 7px 8px -5px rgba(156, 39, 176, 0.2);\n    }\n    \n    @media screen and (max-width: 990px) {\n        .navbar-nav {\n           display: none;\n        }\n    }\n</style>\n<nav class=\"navbar navbar-transparent navbar-absolute\" style=\"color:white;background-color: rgba(0, 0, 0, 0.5); box-shadow: 4px 7px 10px #666;\">\n    <div class=\"container-fluid\">\n        <div class=\"navbar-header\">\n\n            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\">\n                <span class=\"sr-only\">Toggle navigation</span>\n                <span class=\"icon-bar\"></span>\n                <span class=\"icon-bar\"></span>\n                <span class=\"icon-bar\"></span>\n            </button>\n\n            <a class=\"navbar-brand\" routerLink=\"#\">{{getTitle()}}</a>\n\n            <ul class=\"nav navbar-nav navbar-left\">\n                <li>\n                    <a routerLink=\"/home/dashboard\" >\n                        <i class=\"material-icons\">dashboard</i> Dashboard\n                        <div class=\"ripple-container\"></div></a>\n                </li>\n\n                <li class=\"\">\n                    <a routerLink=\"/home/dispatch\">\n                        <i class=\"material-icons\">card_travel</i> Dispatch\n                    </a>\n                </li>\n\n                <li class=\"\">\n                    <a routerLink=\"/home/booking\">\n                        <i class=\"material-icons\">event_seat</i> Booking\n                    </a>\n                </li>\n\n                <li class=\"\">\n                    <a routerLink=\"/home/schedule\">\n                        <i class=\"material-icons\">event</i> Schedule\n                    </a>\n                </li>\n\n               <!-- <li class=\"\">\n                    <a routerLink=\"/pages/register\">\n                        <i class=\"material-icons\">person_add</i> Profile\n                    </a>\n                </li>-->\n\n            </ul>\n\n        </div>\n        <div class=\"collapse navbar-collapse\">\n\n            <ul class=\"nav navbar-nav navbar-right\">\n                <li class=\"dropdown\" id=\"notification\">\n                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">\n                        <i class=\"material-icons\">notifications</i>\n                        <span class=\"notification\">5</span>\n                        <p class=\"hidden-lg hidden-md\">Notifications</p>\n                    </a>\n\n                    <ul class=\"dropdown-menu\" style=\"width: 33em;\">\n\n                        <li>\n                            <div class=\"col-lg-12\">\n                                <div class=\"card card-stats\" style=\"margin:5px 0px;\">\n                                  <div class=\"card-content\" style=\"padding: 0px;\">\n                                    <div class=\"col-lg-1\" style=\"color:white; background:red; max-height: 100px; min-height: 45px;margin-right: 4px; width: 2%;\"><i class=\"material-icons\" style=\" position: relative;left: -12px;top: 6px;\">warning</i> </div>\n                                    <p class=\"title\" style=\"text-align: left;\">New taxiappz version is releasing now so please update the new version in your panel</p>\n                                </div>\n                            </div>\n                        </div>\n                        </li>\n\n                        <li>\n                            <div class=\"col-lg-12\">\n                                <div class=\"card card-stats\" style=\"margin:5px 0px;\">\n                                    <div class=\"card-content\" style=\"padding: 0px;\">\n                                        <div class=\"col-lg-1\" style=\"color:white; background:red; max-height: 100px; min-height: 45px;margin-right: 4px; width: 2%;\"><i class=\"material-icons\" style=\" position: relative;\n    left: -12px;\n    top: 6px;\n\">warning</i> </div>\n                                        <p class=\"title\" style=\"text-align: left;\">New taxiappz version is releasing now so please update the new version in your panel</p>\n                                    </div>\n                                </div>\n                            </div>\n                        </li>\n\n\n                    </ul>\n                </li>\n\n                <li class=\"dropdown\" id=\"notification1\" style=\"height: 51px;\">\n                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" style=\"padding-top: 5px;\">\n                        <img  class=\"customize_image\"  [src]=\"this.profile_pic\"   />\n                    </a>\n\n\n                    <ul class=\"dropdown-menu\" style=\"width: 13em;top: auto;\">\n\n                        <li>\n                            <div class=\"col-lg-12 \">\n                                <!--<div class=\"card card-stats \" style=\"margin:5px 0px;\">\n                                    <div class=\"card-content\" style=\"padding: 0px;\">\n\n                                    </div>\n                                </div>-->\n                                <p class=\"profile_name\" style=\"\">{{ this.profile_name }}</p>\n                            </div>\n                        </li>\n                        <li>\n                            <div class=\"col-lg-12 profile_image_click_dropdown\">\n                                <!--<div class=\"card card-stats \" style=\"margin:5px 0px;\" >\n                                    <div class=\"card-content \" style=\"padding: 0px;\">\n                                -->        <p class=\"title\" style=\"text-align: left;\"><button type=\"button\"   class=\"edit_style\"  title=\"Edit\" (click)=\"edit_dispatch_user()\" >\n                                            Edit\n                                        </button></p>\n                                    <!--</div>\n                                </div>-->\n                            </div>\n                        </li>\n\n\n                        <li>\n                            <div class=\"col-lg-12 profile_image_click_dropdown\">\n                                <!--<div class=\"card card-stats\" style=\"margin:5px 0px;\">\n                                    <div class=\"card-content\" style=\"padding: 0px;\">\n                                -->        <p class=\"title\" style=\"text-align: center;\"> <button type=\"button\"   class=\"logout_style\" data-toggle=\"modal\" data-target=\"#myModal\" title=\"logout\" >\n                                            <i class=\"fa fa-power-off\" style=\"color:rgb(253, 4, 4)\" title=\"Logout\"></i>\n                                        </button></p>\n                                    <!--</div>\n                                </div>-->\n</div>\n                        </li>\n\n\n                    </ul>\n                </li>\n\n\n\n\n\n                <!-- <li class=\"dropdown\">\n                    <a href=\"#pablo\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">\n                       <i class=\"material-icons\" title=\"Profile\">person</i>\n                       <p class=\"hidden-lg hidden-md\">Profile</p>\n                       \n                    </a>\n\n                </li>\n               \n               <li class=\"dropdown\" >\n                    <button type=\"button\"  data-toggle=\"modal\" data-target=\"#myModal\" style=\"margin-top: 8px;\" title=\"logout\" >\n                         <i class=\"fa fa-power-off\" style=\"color:rgb(253, 4, 4)\" title=\"Logout\"></i>       \n                        </button>\n                    \n                    </li>-->\n              \n\n            </ul>\n        </div>\n    </div>\n</nav>\n\n<div class=\"modal\" id=\"myModal\" role=\"dialog\" style=\"\">\n        <div class=\"modal-dialog\">\n        \n          <!-- Modal content-->\n          <div class=\"modal-content\">\n            <div class=\"modal-header\">\n              <button type=\"button\" class=\"close\" style=\"display: none;\" data-dismiss=\"modal\">&times;</button>\n           \n              <h4 class=\"modal-title\" style=\"color: red;font-size: 25px;\">Confirmation</h4>\n            </div>\n            <div class=\"modal-body\" style=\"margin-left: 10px;font-family: initial;font-style: normal;\">\n              <p>Do you want to Logout?</p>\n            </div>\n            <div class=\"modal-footer\" style=\"text-align: center;\">\n                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" (click)=\"close_clicked()\" >Yes</button>\n                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>\n            </div>\n          </div>\n          \n        </div>\n      </div>\n"

/***/ }),

/***/ "../../../../../src/app/Component/navbar/navbar.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return NavbarComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__sidebar_sidebar_component__ = __webpack_require__("../../../../../src/app/Component/sidebar/sidebar.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_common__ = __webpack_require__("../../../common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__Core_BaseComponent__ = __webpack_require__("../../../../../src/app/Core/BaseComponent.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__Core_Http_http__ = __webpack_require__("../../../../../src/app/Core/Http/http.ts");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};






var NavbarComponent = /** @class */ (function (_super) {
    __extends(NavbarComponent, _super);
    function NavbarComponent(location, element, router, http) {
        var _this = _super.call(this) || this;
        _this.element = element;
        _this.router = router;
        _this.http = http;
        _this.showDialog = false;
        _this.profile_pic = "";
        _this.profile_name = "";
        _this.location = location;
        _this.sidebarVisible = false;
        return _this;
        //   this.helper.redirect_login_object=this.router;
    }
    NavbarComponent.prototype.ngOnInit = function () {
        this.listTitles = __WEBPACK_IMPORTED_MODULE_1__sidebar_sidebar_component__["a" /* ROUTES */].filter(function (listTitle) { return listTitle; });
        var navbar = this.element.nativeElement;
        this.toggleButton = navbar.getElementsByClassName('navbar-toggle')[0];
        if (this.helper.system_settings.profile_pic != null) {
            this.profile_pic = this.helper.system_settings.profile_pic;
        }
        else {
            this.profile_pic = this.helper.getConst().file_url + "assets/img/profile_pic.png";
        }
        this.profile_name = this.helper.system_settings.firstname + "" + this.helper.system_settings.lastname;
        //alert(this.profile_name);
    };
    NavbarComponent.prototype.sidebarOpen = function () {
        var toggleButton = this.toggleButton;
        var body = document.getElementsByTagName('body')[0];
        setTimeout(function () {
            toggleButton.classList.add('toggled');
        }, 500);
        body.classList.add('nav-open');
        this.sidebarVisible = true;
    };
    ;
    NavbarComponent.prototype.sidebarClose = function () {
        var body = document.getElementsByTagName('body')[0];
        this.toggleButton.classList.remove('toggled');
        this.sidebarVisible = false;
        body.classList.remove('nav-open');
    };
    ;
    NavbarComponent.prototype.sidebarToggle = function () {
        // const toggleButton = this.toggleButton;
        // const body = document.getElementsByTagName('body')[0];
        if (this.sidebarVisible === false) {
            this.sidebarOpen();
        }
        else {
            this.sidebarClose();
        }
    };
    ;
    NavbarComponent.prototype.edit_dispatch_user = function () {
        alert("edit clicked");
    };
    NavbarComponent.prototype.getTitle = function () {
        var titlee = this.location.prepareExternalUrl(this.location.path());
        if (titlee.charAt(0) === '#') {
            titlee = titlee.slice(2);
        }
        titlee = titlee.split('/').pop();
        for (var item = 0; item < this.listTitles.length; item++) {
            if (this.listTitles[item].path === titlee) {
                return this.listTitles[item].title;
            }
        }
        return 'Dashboard';
    };
    NavbarComponent.prototype.close_clicked = function () {
        // this.helper.clearLocaldata();
        /*  let param = this.get_logout_param();
  
          this.http.postData(this.helper.getConst().logout,param,{object:this,complete: this.logoutHandlerFunction});
  */
        this.helper.clearLocaldata();
        this.router.navigate(['/login']);
    };
    NavbarComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-navbar',
            template: __webpack_require__("../../../../../src/app/Component/navbar/navbar.component.html"),
            styles: [__webpack_require__("../../../../../src/app/Component/navbar/navbar.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_3__angular_common__["f" /* Location */], __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */], __WEBPACK_IMPORTED_MODULE_2__angular_router__["b" /* Router */], __WEBPACK_IMPORTED_MODULE_5__Core_Http_http__["a" /* Http */]])
    ], NavbarComponent);
    return NavbarComponent;
}(__WEBPACK_IMPORTED_MODULE_4__Core_BaseComponent__["a" /* BaseComponent */]));



/***/ }),

/***/ "../../../../../src/app/Component/sidebar/sidebar.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n@media screen and (min-width: 990px) {\n    .sidebar {\n        display: none;\n    }\n}\n", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/Component/sidebar/sidebar.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"sidebar\" data-active-color=\"rose\" data-background-color=\"black\" data-image=\"../../assets/img/sidebar-1.jpg\">\n\n    <div class=\"sidebar-wrapper\">\n\n        <ul class=\"nav\">\n            <li class=\"{{dashboard?'active':''}}\">\n                <a href=\"/dashboard\">\n                    <i class=\"material-icons\">dashboard</i> Dashboard\n                    <div class=\"ripple-container\"></div></a>\n            </li>\n\n            <li class=\"{{maps?'active':''}}\">\n                <a href=\"/maps\">\n                    <i class=\"material-icons\">card_travel</i> Dispatch\n                </a>\n            </li>\n\n            <li class=\"\">\n                <a href=\"/pages/register\">\n                    <i class=\"material-icons\">event_seat</i> Booking\n                </a>\n            </li>\n\n            <li class=\"\">\n                <a href=\"/pages/register\">\n                    <i class=\"material-icons\">event</i> Schedule\n                </a>\n            </li>\n\n            <li class=\"\">\n                <a href=\"/pages/register\">\n                    <i class=\"material-icons\">person_add</i> Users\n                </a>\n            </li>\n\n            <li class=\"\">\n                <a href=\"/pages/login\">\n                    <i class=\"material-icons\">settings</i> Settings\n                </a>\n            </li>\n        </ul>\n    </div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/Component/sidebar/sidebar.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ROUTES; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return SidebarComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__("../../../common/esm5/common.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var ROUTES = [
    { path: 'dashboard', title: 'Dashboard', icon: 'dashboard', class: '' },
    { path: 'user-profile', title: 'User Profile', icon: 'person', class: '' },
    { path: 'table-list', title: 'Table List', icon: 'content_paste', class: '' },
    { path: 'typography', title: 'Typography', icon: 'library_books', class: '' },
    { path: 'icons', title: 'Icons', icon: 'bubble_chart', class: '' },
    { path: 'maps', title: 'Maps', icon: 'location_on', class: '' },
    { path: 'notifications', title: 'Notifications', icon: 'notifications', class: '' },
    { path: 'upgrade', title: 'Upgrade to PRO', icon: 'unarchive', class: 'active-pro' },
];
var SidebarComponent = /** @class */ (function () {
    function SidebarComponent(location) {
        this.location = location;
        this.dashboard = false;
        this.maps = false;
    }
    SidebarComponent.prototype.activemenu = function (url) {
        switch (url) {
            case "/dashboard":
                this.dashboard = true;
                break;
            case "/maps":
                this.maps = true;
                break;
        }
    };
    SidebarComponent.prototype.ngOnInit = function () {
        this.activemenu(this.location['_platformStrategy']._platformLocation.pathname);
        this.menuItems = ROUTES.filter(function (menuItem) { return menuItem; });
    };
    SidebarComponent.prototype.isMobileMenu = function () {
        if ($(window).width() > 991) {
            return false;
        }
        return true;
    };
    ;
    SidebarComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-sidebar',
            template: __webpack_require__("../../../../../src/app/Component/sidebar/sidebar.component.html"),
            styles: [__webpack_require__("../../../../../src/app/Component/sidebar/sidebar.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_common__["f" /* Location */]])
    ], SidebarComponent);
    return SidebarComponent;
}());



/***/ }),

/***/ "../../../../../src/app/Core/BaseComponent.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BaseComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__System_commonfunction__ = __webpack_require__("../../../../../src/app/Core/System/commonfunction.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__error_directive__ = __webpack_require__("../../../../../src/app/Core/error.directive.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var BaseComponent = /** @class */ (function () {
    function BaseComponent() {
        this.helper = __WEBPACK_IMPORTED_MODULE_0__System_commonfunction__;
    }
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_2__angular_core__["_10" /* ViewChild */])(__WEBPACK_IMPORTED_MODULE_1__error_directive__["a" /* ErrorDirective */]),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_1__error_directive__["a" /* ErrorDirective */])
    ], BaseComponent.prototype, "errorhost", void 0);
    return BaseComponent;
}());



/***/ }),

/***/ "../../../../../src/app/Core/Http/http.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Http; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__System_commonfunction__ = __webpack_require__("../../../../../src/app/Core/System/commonfunction.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_common_http__ = __webpack_require__("../../../common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var Http = /** @class */ (function () {
    function Http(http, router) {
        this.http = http;
        this.router = router;
    }
    Http.prototype.commonResponseHandler = function (data, subscribe) {
        if (data.hasOwnProperty("success")) {
            if (data.hasOwnProperty("error_code") && data.error_code == 732) {
                if (subscribe.object.hasOwnProperty("ngOnDestroy")) {
                    subscribe.object.ngOnDestroy();
                }
                this.router.navigate(['login']);
                Object(__WEBPACK_IMPORTED_MODULE_1__System_commonfunction__["showNotification"])({ from: "top", align: "center", type: "danger", message: Object(__WEBPACK_IMPORTED_MODULE_1__System_commonfunction__["Lang"])().please_login });
                return false;
            }
            else if (data.hasOwnProperty("error_message") && data.error_code != 731) {
                Object(__WEBPACK_IMPORTED_MODULE_1__System_commonfunction__["showNotification"])({ from: "top", align: "center", type: "danger", message: data.error_message });
            }
            subscribe.complete(subscribe.object, data);
            return true;
        }
        else {
            Object(__WEBPACK_IMPORTED_MODULE_1__System_commonfunction__["showNotification"])({ from: "top", align: "center", type: "danger", message: Object(__WEBPACK_IMPORTED_MODULE_1__System_commonfunction__["Lang"])().something_went_wrong });
        }
    };
    Http.prototype.getData = function (url, param, subscribe) {
        var _this = this;
        return this.http.get(Object(__WEBPACK_IMPORTED_MODULE_1__System_commonfunction__["getConst"])().base_url + url).subscribe(function (data) { return _this.commonResponseHandler(data, subscribe); }, function (error) { return Object(__WEBPACK_IMPORTED_MODULE_1__System_commonfunction__["http_error_handler"])(subscribe, error, subscribe.error_priority); });
    };
    Http.prototype.postData = function (url, param, subscribe) {
        var _this = this;
        return this.http.post(Object(__WEBPACK_IMPORTED_MODULE_1__System_commonfunction__["getConst"])().base_url + url, param).subscribe(function (data) { return (_this.commonResponseHandler(data, subscribe)); }, function (error) { return Object(__WEBPACK_IMPORTED_MODULE_1__System_commonfunction__["http_error_handler"])(subscribe, error, subscribe.error_priority); });
    };
    Http = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__angular_common_http__["a" /* HttpClient */], __WEBPACK_IMPORTED_MODULE_3__angular_router__["b" /* Router */]])
    ], Http);
    return Http;
}());

var priority;
(function (priority) {
    priority[priority["High"] = 5] = "High";
    priority[priority["Low"] = 1] = "Low";
})(priority || (priority = {}));


/***/ }),

/***/ "../../../../../src/app/Core/Lang/LangLoader.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (immutable) */ __webpack_exports__["a"] = getLang;
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__en_en__ = __webpack_require__("../../../../../src/app/Core/Lang/en/en.ts");

function getLang(langSym) {
    switch (langSym) {
        case "en":
            return __WEBPACK_IMPORTED_MODULE_0__en_en__["a" /* en */];
        default:
            return __WEBPACK_IMPORTED_MODULE_0__en_en__["a" /* en */];
    }
}


/***/ }),

/***/ "../../../../../src/app/Core/Lang/en/en.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return en; });
var en = {
    /*Errors*/
    "email_required": "Email field is Required",
    "email_invalid": "Invalid E-mail",
    "password_required": "Password field is Required",
    "password_min_length": "Password minimum 6 character required",
    "password_max_length": "Password max 12 character required",
    "first_name_required": "First name Required",
    "last_name_required": "Last name Required",
    "phone_number_required": "Phone number Required",
    "phone_must_number": "Phone number must be number",
    "country_code": "Country Required",
    "albhabet_only": "Albhabet only required",
    "country_code_required": "Country required",
    "pick_address_required": "Pickup Address Required",
    "drop_address_required": "Drop Address Required",
    "type_required": "Type Required",
    "start_date_required": "Start Date Required",
    "start_time_required": "Start Time Required",
    /* Language for panel */
    /* Trip page */
    "first": "First",
    "last": "Last",
    "name": "Name",
    "phone": "Phone",
    "number": "Number",
    "country": "Country",
    "code": "Code",
    "pick_address": "Pick up address",
    "drop_address": "Drop up address",
    "select": "Select",
    "type": "Type",
    "ride": "Ride",
    "now": "Now",
    "later": "Later",
    "reset": "Reset",
    "submit": "Submit",
    "details": "Details",
    /*Trip later*/
    "date": "Date",
    "time": "Time",
    "and": "And",
    "invalid_time": "Invalid Time",
    /*Trip Now*/
    "status": "Status",
    "cancel": "Cancel",
    "cancelled": "Cancelled",
    "completed": "Completed",
    "going": "going",
    "trip": "Trip",
    "close": "Close",
    "driver": "Driver",
    "invalid": "Invalid",
    /*Eta calculation*/
    "price": "Price",
    "base": "Base",
    "distance": "Distance",
    "total": "Total",
    "tax": "Tax",
    "per": "Per",
    /*Edit Schedule*/
    "start": "Start",
    "save": "Save",
    "http_error_message": "Something Went Wrong. Please Check your internet.",
    "something_went_wrong": "Something Went Wrong.Try Again",
    "please_login": "Your Session Expired, Please Login Again",
    "no_service": "No Service For this location",
    "no_empty_fields": "Don\'t leave any as field empty",
    /** Nav bar */
    "project_name": "Angular panel",
    "dispatch": "Dispatch",
    "dashboard": "Dashboard",
    "booking": "Booking",
    "schedule": "Schedule",
    "profile": "Profile",
    "user": "User",
    //page
    //login
    "login": "Login",
    "email": "Email",
    "password": "Password",
    "login_submit": "Let's go",
    //dashbaord
    "completed_trips": "Completed Trips",
    "cancelled_trips": "Cancelled Trips",
    "ongoing_trips": "Ongoing Trips",
    "c7_completed": "Last 7 Days Completed Trips",
};


/***/ }),

/***/ "../../../../../src/app/Core/MapHandler/GoogleMap.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return GoogleMap; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__BaseComponent__ = __webpack_require__("../../../../../src/app/Core/BaseComponent.ts");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();

var GoogleMap = /** @class */ (function (_super) {
    __extends(GoogleMap, _super);
    function GoogleMap() {
        var _this = _super !== null && _super.apply(this, arguments) || this;
        _this.driver_markers = [];
        return _this;
    }
    GoogleMap.getHandler = function (google) {
        GoogleMap.googleObject = google;
        return new GoogleMap();
    };
    GoogleMap.prototype.createmap = function (mapArea, mapSetting) {
        var map = new GoogleMap.googleObject.maps.Map(mapArea.nativeElement, {
            zoom: mapSetting.zoom,
            center: mapSetting.center
        });
        return map;
    };
    GoogleMap.prototype.driver_marker_array = function (object, data, type_check) {
        this.driver_data = data;
        this.driver_object = object;
        this.remove_driver_marker();
        var car_red_url = this.helper.getConst().file_url + "assets/img/car_red.png";
        var car_green_url = this.helper.getConst().file_url + "assets/img/car_green.png";
        /* let car_red_url  :   string = "../../../assets/img/car_red.png";
         let car_green_url  : string = "../../../assets/img/car_green.png";
        */ var set_icon;
        var red_image = {
            url: car_red_url,
            scaledSize: new GoogleMap.googleObject.maps.Size(15, 25),
            origin: new GoogleMap.googleObject.maps.Point(0, 0),
            anchor: new GoogleMap.googleObject.maps.Point(0, 0)
        };
        var green_image = {
            url: car_green_url,
            scaledSize: new GoogleMap.googleObject.maps.Size(15, 25),
            origin: new GoogleMap.googleObject.maps.Point(0, 0),
            anchor: new GoogleMap.googleObject.maps.Point(0, 0)
        };
        for (var i = 0; i < data.driver.length; i++) {
            if (data.driver[i].is_available == 1) {
                set_icon = green_image;
            }
            else {
                set_icon = red_image;
            }
            var mark = void 0;
            if ((type_check == data.driver[i].type_id) && (data.driver[i].is_available != 0)) {
                mark = new GoogleMap.googleObject.maps.Marker({
                    icon: set_icon,
                    position: { lat: this.driver_data.driver[i].latitude, lng: this.driver_data.driver[i].longitude },
                    map: this.driver_object.mainMapObject,
                    title: "driver",
                });
                this.driver_markers.push(mark);
            }
            else if ((type_check == data.driver[i].type_id) && (data.driver[i].is_available == 0)) {
                //mark = {};
                console.log("type busy");
            }
            else {
                mark = new GoogleMap.googleObject.maps.Marker({
                    icon: set_icon,
                    position: { lat: this.driver_data.driver[i].latitude, lng: this.driver_data.driver[i].longitude },
                    map: this.driver_object.mainMapObject,
                    title: "driver",
                });
                this.driver_markers.push(mark);
            }
        }
        this.set_driver_marker(this.driver_object.mainMapObject);
    };
    GoogleMap.prototype.remove_driver_marker = function () {
        this.set_driver_marker(null);
        this.driver_markers = [];
    };
    GoogleMap.prototype.set_driver_marker = function (map) {
        var dri_data = this.driver_data;
        var _loop_1 = function (j) {
            this_1.driver_markers[j].setMap(map);
            this_1.driver_markers[j].infowindow = new GoogleMap.googleObject.maps.InfoWindow({});
            GoogleMap.googleObject.maps.event.addListener(this_1.driver_markers[j], 'click', function () {
                if (this.currentInfoWindow != null) {
                    this.currentInfoWindow.close();
                }
                this.infowindow.setContent("<table><tr><td>Name</td><td>: " + dri_data.driver[j].driver_name + "</td><tr><td>Car Type</td><td> : " + dri_data.driver[j].type_name + "</td><tr><td><b>" + dri_data.driver[j].status + "</b></td></tr></table>");
                this.infowindow.open(map, this);
                this.currentInfoWindow = this.infowindow;
            });
        };
        var this_1 = this;
        for (var j = 0; j < this.driver_markers.length; j++) {
            _loop_1(j);
        }
    };
    GoogleMap.prototype.setAutcomplete = function (input, callback) {
        var autocomplete = new GoogleMap.googleObject.maps.places.Autocomplete(input.nativeElement);
        autocomplete.addListener('place_changed', function (e) {
            callback.callback(callback.instance, autocomplete);
        });
    };
    GoogleMap.prototype.createMarker = function (markerset) {
        var marker = new GoogleMap.googleObject.maps.Marker(markerset);
        return marker;
    };
    GoogleMap.prototype.drawdirection = function (draw) {
        this.checkDirectionsRenderer();
        GoogleMap.DirectionsRenderer.setMap(draw.map);
        GoogleMap.DirectionsService.route({
            //  origin: {lat:draw.origin.lat, lng: draw.origin.draw.origin.lng},
            origin: new GoogleMap.googleObject.maps.LatLng(draw.origin.lat, draw.origin.lng),
            destination: new GoogleMap.googleObject.maps.LatLng(draw.destination.lat, draw.destination.lng),
            //destination: {lat:draw.destination.lat, lng: draw.destination.lng},
            travelMode: "DRIVING"
        }, function (response, status) {
            if (status == 'OK') {
                var last = response.routes[0].overview_path.length;
                var path = [];
                for (var i = 0; i <= last - 1; i++) {
                    path.push({ "lat": response.routes[0].overview_path[i].lat(), "lng": response.routes[0].overview_path[i].lng() });
                }
                if (this.navPathStore) {
                    this.navPathStore.setMap(null);
                }
                this.navPathStore = new GoogleMap.googleObject.maps.Polyline({
                    path: path,
                    strokeColor: '#6ea2f8',
                    strokeOpacity: 1.0,
                    strokeWeight: 5
                });
                this.navPathStore.setMap(draw.map);
            }
        });
    };
    GoogleMap.prototype.checkDirectionsRenderer = function () {
        if (GoogleMap.DirectionsRenderer == undefined) {
            GoogleMap.DirectionsRenderer = new GoogleMap.googleObject.maps.DirectionsRenderer;
        }
        this.checkDirectionsService();
    };
    GoogleMap.prototype.checkDirectionsService = function () {
        if (GoogleMap.DirectionsService == undefined) {
            GoogleMap.DirectionsService = new GoogleMap.googleObject.maps.DirectionsService;
        }
    };
    return GoogleMap;
}(__WEBPACK_IMPORTED_MODULE_0__BaseComponent__["a" /* BaseComponent */]));



/***/ }),

/***/ "../../../../../src/app/Core/Storage/local.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Local; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_rxjs__ = __webpack_require__("../../../../rxjs/Rx.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_rxjs___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_rxjs__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_crypto_js__ = __webpack_require__("../../../../crypto-js/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_crypto_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_crypto_js__);


var Local = /** @class */ (function () {
    function Local() {
    }
    Local.setItem = function (name, message) {
        return new __WEBPACK_IMPORTED_MODULE_0_rxjs__["Observable"](function (observer) {
            var encrypted = __WEBPACK_IMPORTED_MODULE_1_crypto_js__["AES"].encrypt(JSON.stringify(message), Local.password);
            localStorage.setItem(name, encrypted.toString());
            observer.next(message);
            observer.complete();
        });
    };
    Local.getItem = function (name) {
        return new __WEBPACK_IMPORTED_MODULE_0_rxjs__["Observable"](function (observer) {
            var decrypted = __WEBPACK_IMPORTED_MODULE_1_crypto_js__["AES"].decrypt(localStorage.getItem(name), Local.password).toString(__WEBPACK_IMPORTED_MODULE_1_crypto_js__["enc"].Utf8);
            observer.next(JSON.parse(decrypted));
            observer.complete();
        });
    };
    Local.remove = function (name) {
        localStorage.removeItem(name);
    };
    Local.removeAll = function () {
        localStorage.clear();
    };
    Local.key = __WEBPACK_IMPORTED_MODULE_1_crypto_js__["enc"].Base64.parse("HackersSeeIT2");
    Local.password = "HackersSeeIT2";
    Local.iv = __WEBPACK_IMPORTED_MODULE_1_crypto_js__["enc"].Base64.parse("#base64IV#");
    return Local;
}());



/***/ }),

/***/ "../../../../../src/app/Core/System/commonfunction.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "system_settings", function() { return system_settings; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "redirect_login_object", function() { return redirect_login_object; });
/* harmony export (immutable) */ __webpack_exports__["Lang"] = Lang;
/* harmony export (immutable) */ __webpack_exports__["setConfig"] = setConfig;
/* harmony export (immutable) */ __webpack_exports__["getConfig"] = getConfig;
/* harmony export (immutable) */ __webpack_exports__["redirect_login_function"] = redirect_login_function;
/* harmony export (immutable) */ __webpack_exports__["clearLocaldata"] = clearLocaldata;
/* harmony export (immutable) */ __webpack_exports__["getConst"] = getConst;
/* harmony export (immutable) */ __webpack_exports__["stop_timer"] = stop_timer;
/* harmony export (immutable) */ __webpack_exports__["DynamicLoader"] = DynamicLoader;
/* harmony export (immutable) */ __webpack_exports__["setValidatorMessage"] = setValidatorMessage;
/* harmony export (immutable) */ __webpack_exports__["http_error_handler"] = http_error_handler;
/* harmony export (immutable) */ __webpack_exports__["showNotification"] = showNotification;
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__Lang_LangLoader__ = __webpack_require__("../../../../../src/app/Core/Lang/LangLoader.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__Storage_local__ = __webpack_require__("../../../../../src/app/Core/Storage/local.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__baseConst__ = __webpack_require__("../../../../../src/app/Core/baseConst.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__error_component_error_component_component__ = __webpack_require__("../../../../../src/app/error-component/error-component.component.ts");




var system_settings = {};
var redirect_login_object = {};
function Lang() {
    return Object(__WEBPACK_IMPORTED_MODULE_0__Lang_LangLoader__["a" /* getLang */])(system_settings['language'] ? system_settings['language'] : "en");
}
function setConfig(data) {
    __WEBPACK_IMPORTED_MODULE_1__Storage_local__["a" /* Local */].setItem("vhsdghsdghsdgh", data).subscribe(function (data) { return system_settings = data; }, function (error) { console.log("seterror"); console.log(error); }, function () { return console.log('file set'); });
    // (new Local()).setItem("test",{language:true}).subscribe((data) => console.log(data),(error) => console.log(error),() => console.log('test'));
}
function getConfig() {
    var _this = this;
    __WEBPACK_IMPORTED_MODULE_1__Storage_local__["a" /* Local */].getItem("vhsdghsdghsdgh").subscribe(function (data) { system_settings = data; console.log("getdata"); }, function (error) { console.log("file"); console.log(_this.redirect_login_function()); }, function () { return console.log('file get'); });
}
function redirect_login_function() {
    //check  router  has navigate key
    var myProp = "navigated";
    if (this.redirect_login_object.hasOwnProperty(myProp)) {
        this.http_error_handler(null, null, 6);
        this.redirect_login_object.navigate(['/login']);
    }
}
function clearLocaldata() {
    __WEBPACK_IMPORTED_MODULE_1__Storage_local__["a" /* Local */].remove("vhsdghsdghsdgh");
}
function getConst() {
    return __WEBPACK_IMPORTED_MODULE_2__baseConst__["a" /* Const */];
}
function stop_timer(time) {
    for (var i = 0; i < time.length; i++) {
        clearInterval(time[i]);
    }
}
function DynamicLoader(object, component) {
    var componentFactory = object.resolver.resolveComponentFactory(component.component);
    var viewContainerRef = object.errorhost.viewContainerRef;
    var view = viewContainerRef.createComponent(componentFactory);
    view.instance[component.param] = component.data;
    return view;
}
function setValidatorMessage(form, error) {
    error.forEach(function (value, index) {
        form['controls'][value['formName']]['statusChanges'].subscribe(function (data) {
            if (form['controls'][value['formName']]['errors'] != null) {
                for (var prop in form['controls'][value['formName']]['errors']) {
                    form.controls[value['formName']]['error_message'] = value['message'][prop] ? value['message'][prop] : "";
                    break;
                }
            }
        });
    });
}
function http_error_handler(subscribe, error, priority) {
    if (priority === void 0) { priority = 1; }
    switch (priority) {
        case 1:
            showNotification({ from: "top", align: "center", type: "danger", message: Lang().http_error_message });
            break;
        case 5:
            DynamicLoader(subscribe.object, { component: __WEBPACK_IMPORTED_MODULE_3__error_component_error_component_component__["a" /* ErrorComponent */], data: Lang().http_error_message, param: "post" });
            break;
        case 6:
            /*Session expired please login*/
            showNotification({ from: "top", align: "center", type: "danger", message: Lang().please_login });
            break;
        case 7:
            /*No driver found*/
            showNotification({ from: "top", align: "center", type: "danger", message: Lang().no_service });
            break;
        case 8:
            /*No driver found*/
            showNotification({ from: "top", align: "center", type: "danger", message: Lang().no_service });
            break;
        default:
            showNotification({ from: "top", align: "center", type: "danger", message: Lang().http_error_message });
            break;
    }
}
function showNotification(data) {
    $.notify({
        icon: "notifications",
        message: data.message
    }, {
        type: data.type,
        timer: 2000,
        placement: {
            from: data.from,
            align: data.align
        }
    });
}


/***/ }),

/***/ "../../../../../src/app/Core/baseConst.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return Const; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return country; });
var Const = {
    "app_name": "DispatcherPanel",
    /*API Url*/
    "base_url": "http://queencar.co/queencar/public/",
    // "base_url" : "http://tllevo.mx/",
    /*its for take image files and others*/
    "file_url": "http://queencar.co/queencar/public/dist/",
    //"file_url" : "http://tllevo.mx/dist/" ,
    /*
     * url
     * */
    "getsettings": "v1/get/settings",
    "gettypes": "v1/application/types",
    "login": "v1/dispatch/login/validation",
    "dashboard": "v1/dispatch/dashboard",
    "userdetail": "v1/dispatch/userdetail",
    "zonetype": "v1/disptach/driver/type/available/zone",
    "eta": "v1/dispatch/application/eta",
    "createrequest": "v1/dispatch/create/request",
    "manualcreaterequest": "v1/dispatch/manual/request/accept",
    "cancelrequest": "v1/dispatch/request/cancel",
    "request_status": "v1/dispatch/request/status",
    "request_later": "v1/dispatch/ride/later",
    "driver_map": "v1/disptach/driver/map",
    "schedule_edit": "v1/dispatch/specific/request/details",
    "schedule_save": "v1/dispatch/edit/request",
    "request_list": "v1/dispatch/request/list",
    "logout": "v1/dispatch/logout",
    "timezone": "+03:00",
};
var country = [{ "name": "Israel", "dial_code": "+972", "code": "IL" }, {
        "name": "Afghanistan",
        "dial_code": "+93",
        "code": "AF"
    }, { "name": "Albania", "dial_code": "+355", "code": "AL" }, {
        "name": "Algeria",
        "dial_code": "+213",
        "code": "DZ"
    }, { "name": "AmericanSamoa", "dial_code": "+1 684", "code": "AS" }, {
        "name": "Andorra",
        "dial_code": "+376",
        "code": "AD"
    }, { "name": "Angola", "dial_code": "+244", "code": "AO" }, {
        "name": "Anguilla",
        "dial_code": "+1 264",
        "code": "AI"
    }, { "name": "Antigua and Barbuda", "dial_code": "+1268", "code": "AG" }, {
        "name": "Argentina",
        "dial_code": "+54",
        "code": "AR"
    }, { "name": "Armenia", "dial_code": "+374", "code": "AM" }, {
        "name": "Aruba",
        "dial_code": "+297",
        "code": "AW"
    }, { "name": "Australia", "dial_code": "+61", "code": "AU" }, {
        "name": "Austria",
        "dial_code": "+43",
        "code": "AT"
    }, { "name": "Azerbaijan", "dial_code": "+994", "code": "AZ" }, {
        "name": "Bahamas",
        "dial_code": "+1 242",
        "code": "BS"
    }, { "name": "Bahrain", "dial_code": "+973", "code": "BH" }, {
        "name": "Bangladesh",
        "dial_code": "+880",
        "code": "BD"
    }, { "name": "Barbados", "dial_code": "+1 246", "code": "BB" }, {
        "name": "Belarus",
        "dial_code": "+375",
        "code": "BY"
    }, { "name": "Belgium", "dial_code": "+32", "code": "BE" }, {
        "name": "Belize",
        "dial_code": "+501",
        "code": "BZ"
    }, { "name": "Benin", "dial_code": "+229", "code": "BJ" }, {
        "name": "Bermuda",
        "dial_code": "+1 441",
        "code": "BM"
    }, { "name": "Bhutan", "dial_code": "+975", "code": "BT" }, {
        "name": "Bosnia and Herzegovina",
        "dial_code": "+387",
        "code": "BA"
    }, { "name": "Botswana", "dial_code": "+267", "code": "BW" }, {
        "name": "Brazil",
        "dial_code": "+55",
        "code": "BR"
    }, { "name": "British Indian Ocean Territory", "dial_code": "+246", "code": "IO" }, {
        "name": "Bulgaria",
        "dial_code": "+359",
        "code": "BG"
    }, { "name": "Burkina Faso", "dial_code": "+226", "code": "BF" }, {
        "name": "Burundi",
        "dial_code": "+257",
        "code": "BI"
    }, { "name": "Cambodia", "dial_code": "+855", "code": "KH" }, {
        "name": "Cameroon",
        "dial_code": "+237",
        "code": "CM"
    }, { "name": "Canada", "dial_code": "+1", "code": "CA" }, {
        "name": "Cape Verde",
        "dial_code": "+238",
        "code": "CV"
    }, { "name": "Cayman Islands", "dial_code": "+ 345", "code": "KY" }, {
        "name": "Central African Republic",
        "dial_code": "+236",
        "code": "CF"
    }, { "name": "Chad", "dial_code": "+235", "code": "TD" }, {
        "name": "Chile",
        "dial_code": "+56",
        "code": "CL"
    }, { "name": "China", "dial_code": "+86", "code": "CN" }, {
        "name": "Christmas Island",
        "dial_code": "+61",
        "code": "CX"
    }, { "name": "Colombia", "dial_code": "+57", "code": "CO" }, {
        "name": "Comoros",
        "dial_code": "+269",
        "code": "KM"
    }, { "name": "Congo", "dial_code": "+242", "code": "CG" }, {
        "name": "Cook Islands",
        "dial_code": "+682",
        "code": "CK"
    }, { "name": "Costa Rica", "dial_code": "+506", "code": "CR" }, {
        "name": "Croatia",
        "dial_code": "+385",
        "code": "HR"
    }, { "name": "Cuba", "dial_code": "+53", "code": "CU" }, {
        "name": "Cyprus",
        "dial_code": "+537",
        "code": "CY"
    }, { "name": "Czech Republic", "dial_code": "+420", "code": "CZ" }, {
        "name": "Denmark",
        "dial_code": "+45",
        "code": "DK"
    }, { "name": "Djibouti", "dial_code": "+253", "code": "DJ" }, {
        "name": "Dominica",
        "dial_code": "+1 767",
        "code": "DM"
    }, { "name": "Dominican Republic", "dial_code": "+1 849", "code": "DO" }, {
        "name": "Ecuador",
        "dial_code": "+593",
        "code": "EC"
    }, { "name": "Egypt", "dial_code": "+20", "code": "EG" }, {
        "name": "El Salvador",
        "dial_code": "+503",
        "code": "SV"
    }, { "name": "Equatorial Guinea", "dial_code": "+240", "code": "GQ" }, {
        "name": "Eritrea",
        "dial_code": "+291",
        "code": "ER"
    }, { "name": "Estonia", "dial_code": "+372", "code": "EE" }, {
        "name": "Ethiopia",
        "dial_code": "+251",
        "code": "ET"
    }, { "name": "Faroe Islands", "dial_code": "+298", "code": "FO" }, {
        "name": "Fiji",
        "dial_code": "+679",
        "code": "FJ"
    }, { "name": "Finland", "dial_code": "+358", "code": "FI" }, {
        "name": "France",
        "dial_code": "+33",
        "code": "FR"
    }, { "name": "French Guiana", "dial_code": "+594", "code": "GF" }, {
        "name": "French Polynesia",
        "dial_code": "+689",
        "code": "PF"
    }, { "name": "Gabon", "dial_code": "+241", "code": "GA" }, {
        "name": "Gambia",
        "dial_code": "+220",
        "code": "GM"
    }, { "name": "Georgia", "dial_code": "+995", "code": "GE" }, {
        "name": "Germany",
        "dial_code": "+49",
        "code": "DE"
    }, { "name": "Ghana", "dial_code": "+233", "code": "GH" }, {
        "name": "Gibraltar",
        "dial_code": "+350",
        "code": "GI"
    }, { "name": "Greece", "dial_code": "+30", "code": "GR" }, {
        "name": "Greenland",
        "dial_code": "+299",
        "code": "GL"
    }, { "name": "Grenada", "dial_code": "+1 473", "code": "GD" }, {
        "name": "Guadeloupe",
        "dial_code": "+590",
        "code": "GP"
    }, { "name": "Guam", "dial_code": "+1 671", "code": "GU" }, {
        "name": "Guatemala",
        "dial_code": "+502",
        "code": "GT"
    }, { "name": "Guinea", "dial_code": "+224", "code": "GN" }, {
        "name": "Guinea-Bissau",
        "dial_code": "+245",
        "code": "GW"
    }, { "name": "Guyana", "dial_code": "+595", "code": "GY" }, {
        "name": "Haiti",
        "dial_code": "+509",
        "code": "HT"
    }, { "name": "Honduras", "dial_code": "+504", "code": "HN" }, {
        "name": "Hungary",
        "dial_code": "+36",
        "code": "HU"
    }, { "name": "Iceland", "dial_code": "+354", "code": "IS" }, {
        "name": "India",
        "dial_code": "+91",
        "code": "IN"
    }, { "name": "Indonesia", "dial_code": "+62", "code": "ID" }, {
        "name": "Iraq",
        "dial_code": "+964",
        "code": "IQ"
    }, { "name": "Ireland", "dial_code": "+353", "code": "IE" }, {
        "name": "Israel",
        "dial_code": "+972",
        "code": "IL"
    }, { "name": "Italy", "dial_code": "+39", "code": "IT" }, {
        "name": "Jamaica",
        "dial_code": "+1876",
        "code": "JM"
    }, { "name": "Japan", "dial_code": "+81", "code": "JP" }, {
        "name": "Jordan",
        "dial_code": "+962",
        "code": "JO"
    }, { "name": "Kazakhstan", "dial_code": "+7 7", "code": "KZ" }, {
        "name": "Kenya",
        "dial_code": "+254",
        "code": "KE"
    }, { "name": "Kiribati", "dial_code": "+686", "code": "KI" }, {
        "name": "Kuwait",
        "dial_code": "+965",
        "code": "KW"
    }, { "name": "Kyrgyzstan", "dial_code": "+996", "code": "KG" }, {
        "name": "Latvia",
        "dial_code": "+371",
        "code": "LV"
    }, { "name": "Lebanon", "dial_code": "+961", "code": "LB" }, {
        "name": "Lesotho",
        "dial_code": "+266",
        "code": "LS"
    }, { "name": "Liberia", "dial_code": "+231", "code": "LR" }, {
        "name": "Liechtenstein",
        "dial_code": "+423",
        "code": "LI"
    }, { "name": "Lithuania", "dial_code": "+370", "code": "LT" }, {
        "name": "Luxembourg",
        "dial_code": "+352",
        "code": "LU"
    }, { "name": "Madagascar", "dial_code": "+261", "code": "MG" }, {
        "name": "Malawi",
        "dial_code": "+265",
        "code": "MW"
    }, { "name": "Malaysia", "dial_code": "+60", "code": "MY" }, {
        "name": "Maldives",
        "dial_code": "+960",
        "code": "MV"
    }, { "name": "Mali", "dial_code": "+223", "code": "ML" }, {
        "name": "Malta",
        "dial_code": "+356",
        "code": "MT"
    }, { "name": "Marshall Islands", "dial_code": "+692", "code": "MH" }, {
        "name": "Martinique",
        "dial_code": "+596",
        "code": "MQ"
    }, { "name": "Mauritania", "dial_code": "+222", "code": "MR" }, {
        "name": "Mauritius",
        "dial_code": "+230",
        "code": "MU"
    }, { "name": "Mayotte", "dial_code": "+262", "code": "YT" }, {
        "name": "Mexico",
        "dial_code": "+52",
        "code": "MX"
    }, { "name": "Monaco", "dial_code": "+377", "code": "MC" }, {
        "name": "Mongolia",
        "dial_code": "+976",
        "code": "MN"
    }, { "name": "Montenegro", "dial_code": "+382", "code": "ME" }, {
        "name": "Montserrat",
        "dial_code": "+1664",
        "code": "MS"
    }, { "name": "Morocco", "dial_code": "+212", "code": "MA" }, {
        "name": "Myanmar",
        "dial_code": "+95",
        "code": "MM"
    }, { "name": "Namibia", "dial_code": "+264", "code": "NA" }, {
        "name": "Nauru",
        "dial_code": "+674",
        "code": "NR"
    }, { "name": "Nepal", "dial_code": "+977", "code": "NP" }, {
        "name": "Netherlands",
        "dial_code": "+31",
        "code": "NL"
    }, { "name": "Netherlands Antilles", "dial_code": "+599", "code": "AN" }, {
        "name": "New Caledonia",
        "dial_code": "+687",
        "code": "NC"
    }, { "name": "New Zealand", "dial_code": "+64", "code": "NZ" }, {
        "name": "Nicaragua",
        "dial_code": "+505",
        "code": "NI"
    }, { "name": "Niger", "dial_code": "+227", "code": "NE" }, {
        "name": "Nigeria",
        "dial_code": "+234",
        "code": "NG"
    }, { "name": "Niue", "dial_code": "+683", "code": "NU" }, {
        "name": "Norfolk Island",
        "dial_code": "+672",
        "code": "NF"
    }, { "name": "Northern Mariana Islands", "dial_code": "+1 670", "code": "MP" }, {
        "name": "Norway",
        "dial_code": "+47",
        "code": "NO"
    }, { "name": "Oman", "dial_code": "+968", "code": "OM" }, {
        "name": "Pakistan",
        "dial_code": "+92",
        "code": "PK"
    }, { "name": "Palau", "dial_code": "+680", "code": "PW" }, {
        "name": "Panama",
        "dial_code": "+507",
        "code": "PA"
    }, { "name": "Papua New Guinea", "dial_code": "+675", "code": "PG" }, {
        "name": "Paraguay",
        "dial_code": "+595",
        "code": "PY"
    }, { "name": "Peru", "dial_code": "+51", "code": "PE" }, {
        "name": "Philippines",
        "dial_code": "+63",
        "code": "PH"
    }, { "name": "Poland", "dial_code": "+48", "code": "PL" }, {
        "name": "Portugal",
        "dial_code": "+351",
        "code": "PT"
    }, { "name": "Puerto Rico", "dial_code": "+1 939", "code": "PR" }, {
        "name": "Qatar",
        "dial_code": "+974",
        "code": "QA"
    }, { "name": "Romania", "dial_code": "+40", "code": "RO" }, {
        "name": "Rwanda",
        "dial_code": "+250",
        "code": "RW"
    }, { "name": "Samoa", "dial_code": "+685", "code": "WS" }, {
        "name": "San Marino",
        "dial_code": "+378",
        "code": "SM"
    }, { "name": "Saudi Arabia", "dial_code": "+966", "code": "SA" }, {
        "name": "Senegal",
        "dial_code": "+221",
        "code": "SN"
    }, { "name": "Serbia", "dial_code": "+381", "code": "RS" }, {
        "name": "Seychelles",
        "dial_code": "+248",
        "code": "SC"
    }, { "name": "Sierra Leone", "dial_code": "+232", "code": "SL" }, {
        "name": "Singapore",
        "dial_code": "+65",
        "code": "SG"
    }, { "name": "Slovakia", "dial_code": "+421", "code": "SK" }, {
        "name": "Slovenia",
        "dial_code": "+386",
        "code": "SI"
    }, { "name": "Solomon Islands", "dial_code": "+677", "code": "SB" }, {
        "name": "South Africa",
        "dial_code": "+27",
        "code": "ZA"
    }, { "name": "South Georgia and the South Sandwich Islands", "dial_code": "+500", "code": "GS" }, {
        "name": "Spain",
        "dial_code": "+34",
        "code": "ES"
    }, { "name": "Sri Lanka", "dial_code": "+94", "code": "LK" }, {
        "name": "Sudan",
        "dial_code": "+249",
        "code": "SD"
    }, { "name": "Suriname", "dial_code": "+597", "code": "SR" }, {
        "name": "Swaziland",
        "dial_code": "+268",
        "code": "SZ"
    }, { "name": "Sweden", "dial_code": "+46", "code": "SE" }, {
        "name": "Switzerland",
        "dial_code": "+41",
        "code": "CH"
    }, { "name": "Tajikistan", "dial_code": "+992", "code": "TJ" }, {
        "name": "Thailand",
        "dial_code": "+66",
        "code": "TH"
    }, { "name": "Togo", "dial_code": "+228", "code": "TG" }, {
        "name": "Tokelau",
        "dial_code": "+690",
        "code": "TK"
    }, { "name": "Tonga", "dial_code": "+676", "code": "TO" }, {
        "name": "Trinidad and Tobago",
        "dial_code": "+1868",
        "code": "TT"
    }, { "name": "Tunisia", "dial_code": "+216", "code": "TN" }, {
        "name": "Turkey",
        "dial_code": "+90",
        "code": "TR"
    }, { "name": "Turkmenistan", "dial_code": "+993", "code": "TM" }, {
        "name": "Turks and Caicos Islands",
        "dial_code": "+1 649",
        "code": "TC"
    }, { "name": "Tuvalu", "dial_code": "+688", "code": "TV" }, {
        "name": "Uganda",
        "dial_code": "+256",
        "code": "UG"
    }, { "name": "Ukraine", "dial_code": "+380", "code": "UA" }, {
        "name": "United Arab Emirates",
        "dial_code": "+971",
        "code": "AE"
    }, { "name": "United Kingdom", "dial_code": "+44", "code": "GB" }, {
        "name": "United States",
        "dial_code": "+1",
        "code": "US"
    }, { "name": "Uruguay", "dial_code": "+598", "code": "UY" }, {
        "name": "Uzbekistan",
        "dial_code": "+998",
        "code": "UZ"
    }, { "name": "Vanuatu", "dial_code": "+678", "code": "VU" }, {
        "name": "Wallis and Futuna",
        "dial_code": "+681",
        "code": "WF"
    }, { "name": "Yemen", "dial_code": "+967", "code": "YE" }, {
        "name": "Zambia",
        "dial_code": "+260",
        "code": "ZM"
    }, {
        "name": "Bolivia, Plurinational State of",
        "dial_code": "+591",
        "code": "BO"
    }, { "name": "Brunei Darussalam", "dial_code": "+673", "code": "BN" }, {
        "name": "Cocos (Keeling) Islands",
        "dial_code": "+61",
        "code": "CC"
    }, { "name": "Congo, The Democratic Republic of the", "dial_code": "+243", "code": "CD" }, {
        "name": "Cote d'Ivoire",
        "dial_code": "+225",
        "code": "CI"
    }, { "name": "Falkland Islands (Malvinas)", "dial_code": "+500", "code": "FK" }, {
        "name": "Guernsey",
        "dial_code": "+44",
        "code": "GG"
    }, { "name": "Holy See (Vatican City State)", "dial_code": "+379", "code": "VA" }, {
        "name": "Hong Kong",
        "dial_code": "+852",
        "code": "HK"
    }, { "name": "Iran, Islamic Republic of", "dial_code": "+98", "code": "IR" }, {
        "name": "Isle of Man",
        "dial_code": "+44",
        "code": "IM"
    }, { "name": "Jersey", "dial_code": "+44", "code": "JE" }, {
        "name": "Korea, Democratic People's Republic of",
        "dial_code": "+850",
        "code": "KP"
    }, { "name": "Korea, Republic of", "dial_code": "+82", "code": "KR" }, {
        "name": "Lao People's Democratic Republic",
        "dial_code": "+856",
        "code": "LA"
    }, { "name": "Libyan Arab Jamahiriya", "dial_code": "+218", "code": "LY" }, {
        "name": "Macao",
        "dial_code": "+853",
        "code": "MO"
    }, {
        "name": "Macedonia, The Former Yugoslav Republic of",
        "dial_code": "+389",
        "code": "MK"
    }, { "name": "Micronesia, Federated States of", "dial_code": "+691", "code": "FM" }, {
        "name": "Moldova, Republic of",
        "dial_code": "+373",
        "code": "MD"
    }, { "name": "Mozambique", "dial_code": "+258", "code": "MZ" }, {
        "name": "Palestinian Territory, Occupied",
        "dial_code": "+970",
        "code": "PS"
    }, { "name": "Pitcairn", "dial_code": "+872", "code": "PN" }, {
        "name": "Réunion",
        "dial_code": "+262",
        "code": "RE"
    }, { "name": "Russia", "dial_code": "+7", "code": "RU" }, {
        "name": "Saint Barthélemy",
        "dial_code": "+590",
        "code": "BL"
    }, {
        "name": "Saint Helena, Ascension and Tristan Da Cunha",
        "dial_code": "+290",
        "code": "SH"
    }, { "name": "Saint Kitts and Nevis", "dial_code": "+1 869", "code": "KN" }, {
        "name": "Saint Lucia",
        "dial_code": "+1 758",
        "code": "LC"
    }, { "name": "Saint Martin", "dial_code": "+590", "code": "MF" }, {
        "name": "Saint Pierre and Miquelon",
        "dial_code": "+508",
        "code": "PM"
    }, { "name": "Saint Vincent and the Grenadines", "dial_code": "+1 784", "code": "VC" }, {
        "name": "Sao Tome and Principe",
        "dial_code": "+239",
        "code": "ST"
    }, { "name": "Somalia", "dial_code": "+252", "code": "SO" }, {
        "name": "Svalbard and Jan Mayen",
        "dial_code": "+47",
        "code": "SJ"
    }, { "name": "Syrian Arab Republic", "dial_code": "+963", "code": "SY" }, {
        "name": "Taiwan, Province of China",
        "dial_code": "+886",
        "code": "TW"
    }, { "name": "Tanzania, United Republic of", "dial_code": "+255", "code": "TZ" }, {
        "name": "Timor-Leste",
        "dial_code": "+670",
        "code": "TL"
    }, { "name": "Venezuela, Bolivarian Republic of", "dial_code": "+58", "code": "VE" }, {
        "name": "Viet Nam",
        "dial_code": "+84",
        "code": "VN"
    }, { "name": "Virgin Islands, British", "dial_code": "+1 284", "code": "VG" }, {
        "name": "Virgin Islands, U.S.",
        "dial_code": "+1 340",
        "code": "VI"
    }];


/***/ }),

/***/ "../../../../../src/app/Core/error.directive.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ErrorDirective; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var ErrorDirective = /** @class */ (function () {
    function ErrorDirective(viewContainerRef) {
        this.viewContainerRef = viewContainerRef;
    }
    ErrorDirective = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["s" /* Directive */])({
            selector: '[errorOverlay]',
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_0__angular_core__["_11" /* ViewContainerRef */]])
    ], ErrorDirective);
    return ErrorDirective;
}());



/***/ }),

/***/ "../../../../../src/app/Directive/EtaDirective.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return EtaDirective; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var EtaDirective = /** @class */ (function () {
    function EtaDirective(viewContainerRef) {
        this.viewContainerRef = viewContainerRef;
    }
    EtaDirective = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["s" /* Directive */])({
            selector: '[etaShow]'
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_0__angular_core__["_11" /* ViewContainerRef */]])
    ], EtaDirective);
    return EtaDirective;
}());



/***/ }),

/***/ "../../../../../src/app/Directive/TriphandleDirective.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return TriphandleDirective; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var TriphandleDirective = /** @class */ (function () {
    function TriphandleDirective(viewContainerRef) {
        this.viewContainerRef = viewContainerRef;
    }
    TriphandleDirective = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["s" /* Directive */])({
            selector: '[TripHandleShow]'
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_0__angular_core__["_11" /* ViewContainerRef */]])
    ], TriphandleDirective);
    return TriphandleDirective;
}());



/***/ }),

/***/ "../../../../../src/app/Directive/TriplaterDirective.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return TriplaterDirective; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var TriplaterDirective = /** @class */ (function () {
    function TriplaterDirective(viewContainerRef) {
        this.viewContainerRef = viewContainerRef;
    }
    TriplaterDirective = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["s" /* Directive */])({
            selector: '[TripLaterShow]'
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_0__angular_core__["_11" /* ViewContainerRef */]])
    ], TriplaterDirective);
    return TriplaterDirective;
}());



/***/ }),

/***/ "../../../../../src/app/Guard.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CanActivateViaAuthGuard; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__Core_System_commonfunction__ = __webpack_require__("../../../../../src/app/Core/System/commonfunction.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



//import isJSDocReturnTag = ts.isJSDocReturnTag;
var CanActivateViaAuthGuard = /** @class */ (function () {
    function CanActivateViaAuthGuard(route) {
        this.route = route;
    }
    CanActivateViaAuthGuard.prototype.canActivate = function () {
        Object(__WEBPACK_IMPORTED_MODULE_2__Core_System_commonfunction__["getConfig"])();
        if (__WEBPACK_IMPORTED_MODULE_2__Core_System_commonfunction__["system_settings"] == null || (!__WEBPACK_IMPORTED_MODULE_2__Core_System_commonfunction__["system_settings"].hasOwnProperty("token") && !__WEBPACK_IMPORTED_MODULE_2__Core_System_commonfunction__["system_settings"].hasOwnProperty("id"))) {
            this.route.navigate(['/login']);
            return false;
        }
        return true;
    };
    CanActivateViaAuthGuard = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_router__["b" /* Router */]])
    ], CanActivateViaAuthGuard);
    return CanActivateViaAuthGuard;
}());



/***/ }),

/***/ "../../../../../src/app/app.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/app.component.html":
/***/ (function(module, exports) {

module.exports = "<router-outlet></router-outlet>"

/***/ }),

/***/ "../../../../../src/app/app.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__Core_BaseComponent__ = __webpack_require__("../../../../../src/app/Core/BaseComponent.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__Core_Http_http__ = __webpack_require__("../../../../../src/app/Core/Http/http.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var AppComponent = /** @class */ (function (_super) {
    __extends(AppComponent, _super);
    function AppComponent(fb, http, router) {
        var _this = _super.call(this) || this;
        _this.fb = fb;
        _this.http = http;
        _this.router = router;
        _this.title = 'app';
        return _this;
    }
    AppComponent.prototype.test = function () {
        this.http.postData(this.helper.getConst().login, this.loginForm.value, { object: this, complete: this.loginFunction });
    };
    AppComponent.prototype.loginFunction = function (object, data) {
    };
    AppComponent.prototype.ngOnInit = function () {
        this.createForm();
    };
    AppComponent.prototype.createForm = function () {
        this.loginForm = this.fb.group({
            email_address: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required, __WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].email]],
            password: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required, __WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].minLength(6)]]
        });
    };
    AppComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-root',
            template: __webpack_require__("../../../../../src/app/app.component.html"),
            styles: [__webpack_require__("../../../../../src/app/app.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["a" /* FormBuilder */], __WEBPACK_IMPORTED_MODULE_3__Core_Http_http__["a" /* Http */], __WEBPACK_IMPORTED_MODULE_4__angular_router__["b" /* Router */]])
    ], AppComponent);
    return AppComponent;
}(__WEBPACK_IMPORTED_MODULE_2__Core_BaseComponent__["a" /* BaseComponent */]));



/***/ }),

/***/ "../../../../../src/app/app.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__app_component__ = __webpack_require__("../../../../../src/app/app.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__Core_Http_http__ = __webpack_require__("../../../../../src/app/Core/Http/http.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__angular_common_http__ = __webpack_require__("../../../common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__app_routing__ = __webpack_require__("../../../../../src/app/app.routing.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__login_login_component__ = __webpack_require__("../../../../../src/app/login/login.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__home_home_component__ = __webpack_require__("../../../../../src/app/home/home.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__Component_components_module__ = __webpack_require__("../../../../../src/app/Component/components.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__Guard__ = __webpack_require__("../../../../../src/app/Guard.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__dashboard_dashboard_component__ = __webpack_require__("../../../../../src/app/dashboard/dashboard.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__dispatch_dispatch_component__ = __webpack_require__("../../../../../src/app/dispatch/dispatch.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__error_component_error_component_component__ = __webpack_require__("../../../../../src/app/error-component/error-component.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__dyanmic_dyanmic_component__ = __webpack_require__("../../../../../src/app/dyanmic/dyanmic.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_16__Core_error_directive__ = __webpack_require__("../../../../../src/app/Core/error.directive.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_17_ngx_bootstrap_datepicker__ = __webpack_require__("../../../../ngx-bootstrap/datepicker/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_18__eta_eta_component__ = __webpack_require__("../../../../../src/app/eta/eta.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_19__Directive_EtaDirective__ = __webpack_require__("../../../../../src/app/Directive/EtaDirective.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_20__triphandler_triphandler_component__ = __webpack_require__("../../../../../src/app/triphandler/triphandler.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_21__Directive_TriphandleDirective__ = __webpack_require__("../../../../../src/app/Directive/TriphandleDirective.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_22__triplater_triplater_component__ = __webpack_require__("../../../../../src/app/triplater/triplater.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_23__Directive_TriplaterDirective__ = __webpack_require__("../../../../../src/app/Directive/TriplaterDirective.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_24_angular2_datetimepicker__ = __webpack_require__("../../../../angular2-datetimepicker/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_25__booking_booking_component__ = __webpack_require__("../../../../../src/app/booking/booking.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_26__redirect_redirect_component__ = __webpack_require__("../../../../../src/app/redirect/redirect.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_27__schedule_schedule_component__ = __webpack_require__("../../../../../src/app/schedule/schedule.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_28__schedule_edit_schedule_edit_component__ = __webpack_require__("../../../../../src/app/schedule-edit/schedule-edit.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_29_ngx_bootstrap_timepicker__ = __webpack_require__("../../../../ngx-bootstrap/timepicker/index.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};


















/*Eta shows*/


/*Trip handle*/


/*Trip later*/


//import {DpDatePickerModule} from 'ng2-date-picker';






var AppModule = /** @class */ (function () {
    function AppModule() {
    }
    AppModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_2__app_component__["a" /* AppComponent */],
                __WEBPACK_IMPORTED_MODULE_8__login_login_component__["a" /* LoginComponent */],
                __WEBPACK_IMPORTED_MODULE_9__home_home_component__["a" /* HomeComponent */],
                __WEBPACK_IMPORTED_MODULE_12__dashboard_dashboard_component__["a" /* DashboardComponent */],
                __WEBPACK_IMPORTED_MODULE_13__dispatch_dispatch_component__["a" /* DispatchComponent */],
                __WEBPACK_IMPORTED_MODULE_14__error_component_error_component_component__["a" /* ErrorComponent */],
                __WEBPACK_IMPORTED_MODULE_15__dyanmic_dyanmic_component__["a" /* DyanmicComponent */],
                __WEBPACK_IMPORTED_MODULE_16__Core_error_directive__["a" /* ErrorDirective */],
                __WEBPACK_IMPORTED_MODULE_18__eta_eta_component__["a" /* EtaComponent */],
                __WEBPACK_IMPORTED_MODULE_19__Directive_EtaDirective__["a" /* EtaDirective */],
                __WEBPACK_IMPORTED_MODULE_21__Directive_TriphandleDirective__["a" /* TriphandleDirective */],
                __WEBPACK_IMPORTED_MODULE_20__triphandler_triphandler_component__["a" /* TriphandlerComponent */],
                __WEBPACK_IMPORTED_MODULE_22__triplater_triplater_component__["a" /* TriplaterComponent */],
                __WEBPACK_IMPORTED_MODULE_23__Directive_TriplaterDirective__["a" /* TriplaterDirective */],
                __WEBPACK_IMPORTED_MODULE_25__booking_booking_component__["a" /* BookingComponent */],
                __WEBPACK_IMPORTED_MODULE_26__redirect_redirect_component__["a" /* RedirectComponent */],
                __WEBPACK_IMPORTED_MODULE_27__schedule_schedule_component__["a" /* ScheduleComponent */],
                __WEBPACK_IMPORTED_MODULE_28__schedule_edit_schedule_edit_component__["a" /* ScheduleEditComponent */],
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__["a" /* BrowserModule */],
                __WEBPACK_IMPORTED_MODULE_3__angular_forms__["e" /* ReactiveFormsModule */],
                __WEBPACK_IMPORTED_MODULE_5__angular_common_http__["b" /* HttpClientModule */],
                __WEBPACK_IMPORTED_MODULE_6__app_routing__["a" /* AppRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_7__angular_router__["c" /* RouterModule */],
                __WEBPACK_IMPORTED_MODULE_10__Component_components_module__["a" /* ComponentsModule */],
                __WEBPACK_IMPORTED_MODULE_24_angular2_datetimepicker__["a" /* AngularDateTimePickerModule */],
                __WEBPACK_IMPORTED_MODULE_17_ngx_bootstrap_datepicker__["a" /* BsDatepickerModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_29_ngx_bootstrap_timepicker__["b" /* TimepickerModule */].forRoot(),
            ],
            providers: [__WEBPACK_IMPORTED_MODULE_4__Core_Http_http__["a" /* Http */], __WEBPACK_IMPORTED_MODULE_11__Guard__["a" /* CanActivateViaAuthGuard */]],
            bootstrap: [__WEBPACK_IMPORTED_MODULE_2__app_component__["a" /* AppComponent */]],
            entryComponents: [__WEBPACK_IMPORTED_MODULE_14__error_component_error_component_component__["a" /* ErrorComponent */], __WEBPACK_IMPORTED_MODULE_18__eta_eta_component__["a" /* EtaComponent */], __WEBPACK_IMPORTED_MODULE_20__triphandler_triphandler_component__["a" /* TriphandlerComponent */], __WEBPACK_IMPORTED_MODULE_22__triplater_triplater_component__["a" /* TriplaterComponent */]]
        })
    ], AppModule);
    return AppModule;
}());



/***/ }),

/***/ "../../../../../src/app/app.routing.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_common__ = __webpack_require__("../../../common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_platform_browser__ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__login_login_component__ = __webpack_require__("../../../../../src/app/login/login.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__home_home_component__ = __webpack_require__("../../../../../src/app/home/home.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__Guard__ = __webpack_require__("../../../../../src/app/Guard.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__dashboard_dashboard_component__ = __webpack_require__("../../../../../src/app/dashboard/dashboard.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__schedule_schedule_component__ = __webpack_require__("../../../../../src/app/schedule/schedule.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__dispatch_dispatch_component__ = __webpack_require__("../../../../../src/app/dispatch/dispatch.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__schedule_edit_schedule_edit_component__ = __webpack_require__("../../../../../src/app/schedule-edit/schedule-edit.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__booking_booking_component__ = __webpack_require__("../../../../../src/app/booking/booking.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__Core_BaseComponent__ = __webpack_require__("../../../../../src/app/Core/BaseComponent.ts");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};













var routes = [
    { path: 'login', component: __WEBPACK_IMPORTED_MODULE_4__login_login_component__["a" /* LoginComponent */] },
    { path: '', pathMatch: "full", redirectTo: 'login' },
    { path: 'home', component: __WEBPACK_IMPORTED_MODULE_5__home_home_component__["a" /* HomeComponent */], children: [
            { path: 'dashboard', component: __WEBPACK_IMPORTED_MODULE_7__dashboard_dashboard_component__["a" /* DashboardComponent */], canActivate: [__WEBPACK_IMPORTED_MODULE_6__Guard__["a" /* CanActivateViaAuthGuard */]] },
            { path: 'dispatch', component: __WEBPACK_IMPORTED_MODULE_9__dispatch_dispatch_component__["a" /* DispatchComponent */], canActivate: [__WEBPACK_IMPORTED_MODULE_6__Guard__["a" /* CanActivateViaAuthGuard */]] },
            { path: 'booking', component: __WEBPACK_IMPORTED_MODULE_11__booking_booking_component__["a" /* BookingComponent */], canActivate: [__WEBPACK_IMPORTED_MODULE_6__Guard__["a" /* CanActivateViaAuthGuard */]] },
            { path: 'schedule', component: __WEBPACK_IMPORTED_MODULE_8__schedule_schedule_component__["a" /* ScheduleComponent */], canActivate: [__WEBPACK_IMPORTED_MODULE_6__Guard__["a" /* CanActivateViaAuthGuard */]] },
            { path: 'schedule_edit/:id', component: __WEBPACK_IMPORTED_MODULE_10__schedule_edit_schedule_edit_component__["a" /* ScheduleEditComponent */], canActivate: [__WEBPACK_IMPORTED_MODULE_6__Guard__["a" /* CanActivateViaAuthGuard */]] },
            { path: '', pathMatch: "full", redirectTo: 'dashboard' },
        ]
    },
];
var AppRoutingModule = /** @class */ (function (_super) {
    __extends(AppRoutingModule, _super);
    function AppRoutingModule(route) {
        var _this = _super.call(this) || this;
        _this.route = route;
        return _this;
        //console.log(this.helper.redirect_login_object);
        //this.helper.redirect_login_object= this.route;
    }
    AppRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_3__angular_core__["I" /* NgModule */])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_0__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_1__angular_platform_browser__["a" /* BrowserModule */],
                __WEBPACK_IMPORTED_MODULE_2__angular_router__["c" /* RouterModule */].forRoot(routes, { useHash: true })
            ],
            exports: [],
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__angular_router__["b" /* Router */]])
    ], AppRoutingModule);
    return AppRoutingModule;
}(__WEBPACK_IMPORTED_MODULE_12__Core_BaseComponent__["a" /* BaseComponent */]));



/***/ }),

/***/ "../../../../../src/app/booking/booking.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "/*\n.center {\n    text-align: center;\n}\n\n.custom_pagination {\n    display: inline-block;\n}\n\n.custom_pagination li {\n\n    color: black;\n    float: left;\n    padding: 8px 16px;\n    text-decoration: none;\n    border: 1px solid #ddd;\n    background-color: white;\n}\n\n.custom_pagination li.active {\n    background-color: #4CAF50;\n    color: white;\n    border: 1px solid #4CAF50;\n}\n\n.custom_pagination li:hover:not(.active) {background-color: #fafeff;}\n\n.custom_pagination li:first-child {\n    border-top-left-radius: 5px;\n    border-bottom-left-radius: 5px;\n}\n\n.custom_pagination li:last-child {\n    border-top-right-radius: 5px;\n    border-bottom-right-radius: 5px;\n}\n*/\n\n", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/booking/booking.component.html":
/***/ (function(module, exports) {

module.exports = "\n<div class=\"booking_page\">\n<div class=\"box box-danger booking_page_body\">\n  <div class=\"box-header\" >\n    <h3 class=\"box-title\">Filter</h3>\n  </div>\n  <div class=\"box-body\">\n    <div class=\"row\">\n\n        <div class=\"col-md-6 col-sm-6 col-lg-6\">\n\n          <input\n                  class=\"form-control\"\n\n                  bsDatepicker\n                  [bsConfig]=\"{ dateInputFormat: 'YYYY-MM-DD' }\"\n                  placeholder=\"Start Date\"\n                  #start_date\n\n          >\n\n          <!--#dp=\"bsDatepicker\"-->\n          <br>\n        </div>\n\n\n        <div class=\"col-md-6 col-sm-6 col-lg-6\">\n          <input\n                  class=\"form-control\"\n\n                  bsDatepicker\n                  [bsConfig]=\"{ dateInputFormat: 'YYYY-MM-DD' }\"\n                  placeholder=\"End Date\"\n                 #end_date\n\n          >\n          <!--//#dp1=\"bsDatepicker\"-->\n          <br>\n        </div>\n\n        <div class=\"col-md-12 col-sm-12 col-lg-4\">\n\n          <select name=\"trip_status\" #trip_status  class=\"form-control\">\n\n            <option value=\"\" disabled>Trip Status</option>\n            <option value=\"1\">Trip not yet start</option>\n            <option value=\"2\">ongoing</option>\n            <option value=\"3\">Completed</option>\n            <option value=\"4\">Cancelled</option>\n          </select>\n          <br>\n        </div>\n\n      <div class=\"col-md-4 col-sm-4 col-lg-4\">\n\n        <select name=\"payment_status\" #payment_status class=\"form-control\">\n\n          <option value=\"\" disabled>Payment Status</option>\n          <option value=\"1\">Paid</option>\n          <option value=\"0\">Unpaid</option>\n        </select>\n        <br>\n      </div>\n\n      <div class=\"col-md-4 col-sm-4 col-lg-4\">\n\n        <select name=\"payment_type\" #payment_type class=\"form-control\">\n\n          <option value=\"\" disabled>Payment type</option>\n          <option value=\"1\">Cash</option>\n          <option value=\"0\">Card</option>\n        </select>\n        <br>\n      </div>\n\n\n      <div class=\"col-md-6 col-sm-6 col-lg-6\">\n          <input type=\"text\" class=\"form-control\" style=\"overflow:hidden;\" #driver_name  name=\"driver_name\" placeholder=\"Driver name\"  value=\"\">\n          <br>\n        </div>\n\n        <div class=\"col-md-6 col-sm-6 col-lg-6\">\n\n          <input type=\"text\" class=\"form-control\" style=\"overflow:hidden;\"  #user_name name=\"user_name\" placeholder=\"User name\"  value=\"\">\n\n          <br>\n        </div>\n\n\n    </div>\n  </div><!-- /.box-body -->\n  <div class=\"box-footer\">\n    <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" (click)=\"filter_data()\" >Filter Data</button>\n    <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" (click)=\"reset()\" >Reset</button>\n  </div>\n</div>\n{{ this.message}}\n\n<div class=\"booking_page_table_total\" #data_table_view>\n\n  {{ this.select_page_style }} of {{ this.total_pages }}\n</div>\n\n<div #data_table class=\"box box-danger\">\n  <table class=\"table table-bordered\" id=\"request_list\">\n    <tr>\n      <th>Request id</th>\n      <th>User</th>\n      <th>Driver</th>\n      <th>Start time</th>\n      <th>Trip Status</th>\n      <th>Amount</th>\n      <th>Payment mode</th>\n      <th>Payment Status</th>\n    </tr>\n\n\n\n    <tr *ngFor=\"let items  of this.display_data\">\n      <td>{{ items.request_id  }}</td>\n      <td>{{ (items.user_name !=  null)  ? items.user_name  : \"-\" }}</td>\n      <td>{{ (items.driver_name != null) ? items.driver_name : \"-\"   }}</td>\n      <td>{{ (items.trip_start_time != null )  ? items.trip_start_time : \"-\"  }}</td>\n      <td>{{ items.trip_status  }}</td>\n      <td>{{ items.trip_bill  }}</td>\n      <td>{{ items.payment_type_select  }}</td>\n      <td>{{ items.is_paid_message  }}</td>\n\n    </tr>\n  </table>\n\n</div>\n\n\n\n\n\n\n\n\n\n  <div class=\"custom_pagination\" #pagination>\n\n    <li #prev (click)=\"prev_click()\" >&laquo;</li>\n\n    <li *ngFor=\"let arr of page_arr\" (click)=\"select_page($event)\" [value]=\"arr.page_no\"  class=\"{{ arr.page_no === this.select_page_style ? 'active':''}}\">\n      {{ arr.page_txt }}\n    </li>\n\n    <li #last (click)=\"last_click()\">&raquo;</li>\n\n  </div>\n\n\n</div>"

/***/ }),

/***/ "../../../../../src/app/booking/booking.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BookingComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__Core_BaseComponent__ = __webpack_require__("../../../../../src/app/Core/BaseComponent.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__Core_Http_http__ = __webpack_require__("../../../../../src/app/Core/Http/http.ts");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



//import {MatDatepickerModule} from '@angular/material/datepicker';
var BookingComponent = /** @class */ (function (_super) {
    __extends(BookingComponent, _super);
    //display_data : any[];
    function BookingComponent(http) {
        var _this = _super.call(this) || this;
        _this.http = http;
        _this.date = new Date();
        _this.setting_date = {
            bigBanner: false,
            timePicker: false,
            defaultOpen: false,
        };
        _this.message = "";
        _this.select_page_style = 1;
        _this.ride_later = 0;
        _this.page_arr = [];
        return _this;
    }
    BookingComponent.prototype.ngOnInit = function () {
        this.get_data(this.select_page_style, this.ride_later, this);
    };
    BookingComponent.prototype.filter_data = function () {
        /*
        
          console.log("start : ");
          console.log(this.start_date);
          console.log("end : ");
          console.log(this.end_date);
          console.log("trip_status : ");
          console.log(this.trip_status);
          console.log("payment_status : ");
          console.log(this.payment_status);
          console.log("driver_name : ");
          console.log(this.driver_name);
          console.log("username : ");
          console.log(this.user_name);
          console.log(" payment_mode : ");
          console.log(this.payment_type);
        */
        var param_start_date = this.start_date.nativeElement.value;
        var param_end_date = this.end_date.nativeElement.value;
        var get_data_start = true;
        if ((param_start_date != "") && (param_end_date == "")) {
            alert("End date required");
            get_data_start = false;
        }
        else if ((param_start_date == "") && (param_end_date != "")) {
            alert("Start date required");
            get_data_start = false;
        }
        else if ((param_start_date != "") && (param_end_date != "")) {
            var p_start_date = new Date(param_start_date + " 00:00:00");
            var p_end_date = new Date(param_end_date + " 23:59:59");
            if (p_start_date.getTime() > p_end_date.getTime()) {
                alert("Invalid Start date or End date");
                get_data_start = false;
            }
        }
        if (get_data_start) {
            this.select_page_style = 1;
            this.get_data(this.select_page_style, this.ride_later, this);
        }
    };
    BookingComponent.prototype.reset = function () {
        this.start_date.nativeElement.value = "";
        this.end_date.nativeElement.value = "";
        this.trip_status.nativeElement.value = "";
        this.payment_status.nativeElement.value = "";
        this.driver_name.nativeElement.value = "";
        this.user_name.nativeElement.value = "";
        this.payment_type.nativeElement.value = "";
        this.ngOnInit();
    };
    BookingComponent.prototype.get_data = function (select_page_no, ride_later_details, current_object) {
        var param = this.param_setting(select_page_no, ride_later_details, current_object);
        this.http.postData(this.helper.getConst().request_list, param, { object: this, complete: this.set_data });
    };
    BookingComponent.prototype.set_data = function (list_object, list_response) {
        if (list_response.success) {
            list_object.total_value = list_response.total_no_of_request;
            list_object.total_pages = (list_object.total_value / 10) > 0 ? Math.ceil(list_object.total_value / 10) : 1;
            list_object.display_data = list_response.request;
            list_object.pagination_settings(list_object.total_value, list_object.total_pages);
        }
        else {
            list_object.message = "No result found";
            list_object.pagination.nativeElement.style.display = "none";
            list_object.data_table.nativeElement.style.display = "none";
            list_object.data_table_view.nativeElement.style.display = "none";
        }
    };
    BookingComponent.prototype.select_page = function (event) {
        var click_page = event.target.value;
        this.select_page_style = click_page;
        this.prev.nativeElement.value = click_page;
        this.last.nativeElement.value = click_page;
        this.get_data(click_page, this.ride_later, this);
    };
    BookingComponent.prototype.prev_click = function () {
        var existing_page = this.prev.nativeElement.value;
        var move;
        if (existing_page != 1) {
            move = existing_page - 1;
            this.prev.nativeElement.value = move;
            this.last.nativeElement.value = move;
        }
        else {
            move = existing_page;
            this.prev.nativeElement.value = move;
            this.last.nativeElement.value = move;
        }
        this.select_page_style = move;
        this.get_data(move, this.ride_later, this);
        // this.page_arr = this.pagination_maker(move,this.total_pages);
    };
    BookingComponent.prototype.param_setting = function (select_page, ride_late_details, obj) {
        var param_trip_status = obj.trip_status.nativeElement.value;
        var param_payment_status = obj.payment_status.nativeElement.value;
        var param_driver_name = obj.driver_name.nativeElement.value;
        var param_user_name = obj.user_name.nativeElement.value;
        var param_payment_type = obj.payment_type.nativeElement.value;
        var param_start_date = obj.start_date.nativeElement.value;
        var param_end_date = obj.end_date.nativeElement.value;
        return {
            id: this.helper.system_settings.id,
            token: this.helper.system_settings.token,
            page: select_page,
            ride_later: ride_late_details,
            search_key_user: param_user_name,
            search_key_driver: param_driver_name,
            search_key_trip_status: param_trip_status,
            search_key_payment_type: param_payment_type,
            search_key_payment_status: param_payment_status,
            search_key_from_date: (param_start_date.length > 0) ? param_start_date + " 00:00:00" : "",
            search_key_to_date: (param_end_date.length > 0) ? param_end_date + " 23:59:59" : "",
        };
    };
    BookingComponent.prototype.last_click = function () {
        var existing_page = this.last.nativeElement.value;
        var move;
        if (existing_page != this.total_pages) {
            move = existing_page + 1;
            this.last.nativeElement.value = move;
            this.prev.nativeElement.value = move;
        }
        else {
            move = existing_page;
            this.last.nativeElement.value = move;
            this.prev.nativeElement.value = move;
        }
        this.select_page_style = move;
        this.get_data(move, this.ride_later, this);
        //  this.page_arr = this.pagination_maker(move,this.total_pages);
    };
    /*if tot_values greater than of 10 mean generate pagination else dont show*/
    BookingComponent.prototype.pagination_settings = function (tot_values, tot_pages) {
        var total_value = tot_values;
        //  alert(tot_pages);
        if (total_value >= 1) {
            var initial_click = this.select_page_style;
            this.page_arr = [];
            this.page_arr = this.pagination_maker(initial_click, tot_pages);
            this.prev.nativeElement.value = initial_click;
            this.last.nativeElement.value = initial_click;
            if (tot_values > 10) {
                this.pagination.nativeElement.style.display = "block";
            }
            else {
                this.pagination.nativeElement.style.display = "none";
            }
            this.data_table.nativeElement.style.display = "block";
            this.data_table_view.nativeElement.style.display = "block";
            this.message = "";
        }
        else {
            this.message = "No result found";
            this.pagination.nativeElement.style.display = "none";
            this.data_table.nativeElement.style.display = "none";
            this.data_table_view.nativeElement.style.display = "none";
        }
    };
    /*pagination maker just give starting page(click_page_number) and total_page */
    BookingComponent.prototype.pagination_maker = function (click_page_number, total_pages) {
        var num = 0;
        var count = 0;
        var page_view_data = [];
        var start_page = (click_page_number - 2) > 0 ? (click_page_number - 2) : 1;
        /*To Arrange array for page*/
        for (num = start_page; num < total_pages; num++) {
            if (count > 3) {
                count++;
            }
            else {
                var temp = void 0;
                var page_text = void 0;
                if (num == 1) {
                    page_text = "First";
                }
                else if (num == total_pages) {
                    page_text = "Last";
                }
                else {
                    page_text = num;
                }
                temp = {
                    "page_no": (num),
                    "page_txt": page_text,
                    "page_start": ((num * 10) - 9) < 0 ? 1 : ((num * 10) - 9),
                };
                page_view_data.push(temp);
                count++;
            }
        }
        /*To check first and last page.... if not there add both*/
        if (page_view_data.length > 0) {
            if (page_view_data[0].page_no != 1) {
                var first_elem = {
                    "page_no": 1,
                    "page_txt": "First",
                    "page_start": 1,
                };
                page_view_data.unshift(first_elem);
            }
            if (page_view_data[(page_view_data.length) - 1].page_no != total_pages) {
                var last_elem = {
                    "page_no": total_pages,
                    "page_txt": "Last",
                    "page_start": (total_pages * 10) - 9,
                };
                page_view_data.push(last_elem);
            }
        }
        return page_view_data;
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('last'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "last", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('prev'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "prev", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('pagination'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "pagination", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('data_table'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "data_table", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('data_table_view'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "data_table_view", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('start_date'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "start_date", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('end_date'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "end_date", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('trip_status'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "trip_status", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('payment_status'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "payment_status", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('driver_name'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "driver_name", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('user_name'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "user_name", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('payment_type'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], BookingComponent.prototype, "payment_type", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('datepick'),
        __metadata("design:type", Object)
    ], BookingComponent.prototype, "datepick", void 0);
    BookingComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-booking',
            template: __webpack_require__("../../../../../src/app/booking/booking.component.html"),
            styles: [__webpack_require__("../../../../../src/app/booking/booking.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__Core_Http_http__["a" /* Http */]])
    ], BookingComponent);
    return BookingComponent;
}(__WEBPACK_IMPORTED_MODULE_1__Core_BaseComponent__["a" /* BaseComponent */]));



/***/ }),

/***/ "../../../../../src/app/dashboard/dashboard.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/dashboard/dashboard.component.html":
/***/ (function(module, exports) {

module.exports = "\n<div class=\"main-content\" style=\"margin-top: 6%;\">\n\n    <div errorOverlay>\n\n        <div class=\"container-fluid\">\n            <div id=\"overlay\" style=\"display: none;\">\n                <span class=\"block\" id=\"block\">Please wait...</span>\n            </div>\n            <div class=\"row\">\n                <div class=\"col-lg-4 col-md-4 col-sm-6\">\n                    <div class=\"card card-stats\" >\n                        <div class=\"card-header\" data-background-color=\"orange\">\n                            <i class=\"material-icons\">done_all</i>\n                        </div>\n                        <div class=\"card-content\">\n                            <p class=\"category\">{{this.helper.Lang().completed_trips}}</p>\n                            <h3 class=\"title\">{{completed_trips}}</h3>\n                        </div>\n                    </div>\n                </div>\n                <div class=\"col-lg-4 col-md-4 col-sm-6\">\n                    <div class=\"card card-stats\" >\n                        <div class=\"card-header\" data-background-color=\"red\">\n                            <i class=\"material-icons\">info_outline</i>\n                        </div>\n                        <div class=\"card-content\">\n                            <p class=\"category\">{{this.helper.Lang().cancelled_trips}}</p>\n                            <h3 class=\"title\">{{cancelled_trips}}</h3>\n                        </div>\n                    </div>\n                </div>\n                <div class=\"col-lg-4 col-md-4 col-sm-6\">\n                    <div class=\"card card-stats\" >\n                        <div class=\"card-header\" data-background-color=\"blue\">\n                            <i class=\"material-icons\">directions_bike</i>\n                        </div>\n                        <div class=\"card-content\">\n                            <p class=\"category\">{{this.helper.Lang().ongoing_trips}}</p>\n                            <h3 class=\"title\">{{ongoing_trips}}</h3>\n                        </div>\n                    </div>\n                </div>\n\n            </div>\n\n\n\n           <div class=\"row\">\n                <div class=\"col-md-4\">\n                    <div class=\"card\" >\n                        <div class=\"card-header card-chart\" data-background-color=\"green\">\n                            <div class=\"ct-chart\" id=\"dailySalesChart\"></div>\n                        </div>\n                        <div class=\"card-content\">\n                            <h4 class=\"title\">{{this.helper.Lang().c7_completed}}</h4>\n                        </div>\n                    </div>\n                </div>\n\n                <div class=\"col-md-4\">\n                    <div class=\"card\" >\n                        <div class=\"card-header card-chart\" data-background-color=\"orange\">\n                            <div class=\"ct-chart\" id=\"emailsSubscriptionChart\"></div>\n                        </div>\n                        <div class=\"card-content\">\n                            <h4 class=\"title\">{{this.helper.Lang().completed_trips}}</h4>\n                        </div>\n                    </div>\n                </div>\n\n                <div class=\"col-md-4\">\n                    <div class=\"card\" >\n                        <div class=\"card-header card-chart\" data-background-color=\"red\">\n                            <div class=\"ct-chart\" id=\"completedTasksChart\"></div>\n                        </div>\n                        <div class=\"card-content\">\n                            <h4 class=\"title\">{{this.helper.Lang().cancelled_trips}}</h4>\n                        </div>\n                    </div>\n                </div>\n            </div>\n\n        </div>\n\n        </div>\n</div>\n"

/***/ }),

/***/ "../../../../../src/app/dashboard/dashboard.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return DashboardComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__Core_BaseComponent__ = __webpack_require__("../../../../../src/app/Core/BaseComponent.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__Core_Http_http__ = __webpack_require__("../../../../../src/app/Core/Http/http.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_chartist__ = __webpack_require__("../../../../chartist/dist/chartist.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_chartist___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_chartist__);
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var DashboardComponent = /** @class */ (function (_super) {
    __extends(DashboardComponent, _super);
    function DashboardComponent(resolver, http) {
        var _this = _super.call(this) || this;
        _this.resolver = resolver;
        _this.http = http;
        return _this;
    }
    DashboardComponent.prototype.ngAfterViewInit = function () {
    };
    DashboardComponent.prototype.startAnimationForLineChart = function (chart) {
        var seq, delays, durations;
        seq = 0;
        delays = 80;
        durations = 500;
        chart.on('draw', function (data) {
            if (data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 600,
                        dur: 700,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: __WEBPACK_IMPORTED_MODULE_3_chartist__["Svg"].Easing.easeOutQuint
                    }
                });
            }
            else if (data.type === 'point') {
                seq++;
                data.element.animate({
                    opacity: {
                        begin: seq * delays,
                        dur: durations,
                        from: 0,
                        to: 1,
                        easing: 'ease'
                    }
                });
            }
        });
        seq = 0;
    };
    ;
    DashboardComponent.prototype.startAnimationForBarChart = function (chart) {
        var seq2, delays2, durations2;
        seq2 = 0;
        delays2 = 80;
        durations2 = 500;
        chart.on('draw', function (data) {
            if (data.type === 'bar') {
                seq2++;
                data.element.animate({
                    opacity: {
                        begin: seq2 * delays2,
                        dur: durations2,
                        from: 0,
                        to: 1,
                        easing: 'ease'
                    }
                });
            }
        });
        seq2 = 0;
    };
    ;
    DashboardComponent.prototype.renderDashboard = function (object, data) {
        console.log("data");
        console.log(data);
        object.dashData = data;
        object.completed_trips = data.dispatch_dashboard.completedTrips;
        object.cancelled_trips = data.dispatch_dashboard.cancelledTrips;
        object.ongoing_trips = data.dispatch_dashboard.ongoingTrips;
        object.drawchart();
    };
    DashboardComponent.prototype.drawchart = function () {
        this.green_line_chart();
        this.bar_chat();
        this.red_chart();
    };
    DashboardComponent.prototype.bar_chat = function () {
        var date1 = [];
        var sum = [];
        for (var prop in this.dashData.dispatch_dashboard.last12MonthsCompletedTrips) {
            date1.push(prop);
            sum.push(this.dashData.dispatch_dashboard.last12MonthsCompletedTrips[prop]);
        }
        /* ----------==========     Completed Tasks Chart initialization    ==========---------- */
        var dataCompletedTasksChart = {
            labels: date1,
            series: [
                sum
            ]
        };
        var optionsCompletedTasksChart = {
            lineSmooth: __WEBPACK_IMPORTED_MODULE_3_chartist__["Interpolation"].cardinal({
                tension: 0
            }),
            low: 0,
            high: 400,
            chartPadding: { top: 0, right: 0, bottom: 0, left: 0 }
        };
        var completedTasksChart = new __WEBPACK_IMPORTED_MODULE_3_chartist__["Line"]('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);
        // start animation for the Completed Tasks Chart - Line Chart
        this.startAnimationForLineChart(completedTasksChart);
    };
    /*
     * draw red chart
     * */
    DashboardComponent.prototype.red_chart = function () {
        var date1 = [];
        var sum = [];
        for (var prop in this.dashData.dispatch_dashboard.last12MonthsCancelledTrips) {
            date1.push(prop);
            sum.push(this.dashData.dispatch_dashboard.last12MonthsCancelledTrips[prop]);
        }
        /* ----------==========     Emails Subscription Chart initialization    ==========---------- */
        var dataEmailsSubscriptionChart = {
            labels: date1,
            series: [
                sum
            ]
        };
        var optionsEmailsSubscriptionChart = {
            axisX: {
                showGrid: false
            },
            low: 0,
            high: 1000,
            chartPadding: { top: 0, right: 5, bottom: 0, left: 0 }
        };
        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function (value) {
                            return value[0];
                        }
                    }
                }]
        ];
        var emailsSubscriptionChart = new __WEBPACK_IMPORTED_MODULE_3_chartist__["Bar"]('#emailsSubscriptionChart', dataEmailsSubscriptionChart, optionsEmailsSubscriptionChart, responsiveOptions);
        //start animation for the Emails Subscription Chart
        this.startAnimationForBarChart(emailsSubscriptionChart);
    };
    DashboardComponent.prototype.green_line_chart = function () {
        var date1 = [];
        var sum = [];
        for (var prop in this.dashData.dispatch_dashboard.last7DaysCompletedTrips) {
            date1.push(prop);
            sum.push(this.dashData.dispatch_dashboard.last7DaysCompletedTrips[prop]);
        }
        /*  */
        var dataDailySalesChart = {
            labels: date1,
            series: [
                sum
            ]
        };
        var optionsDailySalesChart = {
            lineSmooth: __WEBPACK_IMPORTED_MODULE_3_chartist__["Interpolation"].cardinal({
                tension: 0
            }),
            low: 0,
            high: 50,
            chartPadding: { top: 0, right: 0, bottom: 0, left: 0 },
        };
        var dailySalesChart = new __WEBPACK_IMPORTED_MODULE_3_chartist__["Line"]('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);
        this.startAnimationForLineChart(dailySalesChart);
    };
    DashboardComponent.prototype.ngOnInit = function () {
        this.http.postData(this.helper.getConst().dashboard, { id: this.helper.system_settings.id, token: this.helper.system_settings.token }, { object: this, error_priority: 5, complete: this.renderDashboard });
    };
    DashboardComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-dashboard',
            template: __webpack_require__("../../../../../src/app/dashboard/dashboard.component.html"),
            styles: [__webpack_require__("../../../../../src/app/dashboard/dashboard.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_0__angular_core__["p" /* ComponentFactoryResolver */], __WEBPACK_IMPORTED_MODULE_2__Core_Http_http__["a" /* Http */]])
    ], DashboardComponent);
    return DashboardComponent;
}(__WEBPACK_IMPORTED_MODULE_1__Core_BaseComponent__["a" /* BaseComponent */]));



/***/ }),

/***/ "../../../../../src/app/dispatch/dispatch.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/dispatch/dispatch.component.html":
/***/ (function(module, exports) {

module.exports = "\n<div class=\"main-content\">\n\n  <div id=\"overlay\" style=\"display: none;\">\n      <span class=\"block\" id=\"block\">Please wait...</span>\n  </div>\n\n    <div TripHandleShow viewBox=\"25 25 50 50\">\n\n    </div>\n\n    <div TripLaterShow viewBox=\"25 25 50 50\">\n\n    </div>\n\n    <div #loader class=\"loader\" style=\"display: none\"></div>\n\n\n    <div class=\"container-fluid\">\n      <div id=\"overlay1\" style=\"display: none;\">\n      <div class=\"loader\" id=\"loader\" style=\"display: block;\">\n          <svg class=\"circular\" viewBox=\"25 25 50 50\">\n              <circle class=\"path\" cx=\"50\" cy=\"50\" r=\"20\" fill=\"none\" stroke-width=\"2\" stroke-miterlimit=\"10\"/>\n          </svg>\n      </div>\n          </div>\n          <div class=\"row\">\n              <div class=\"col-md-4\">\n                  <div class=\"card\">\n                      <div class=\"card-header card-header-icon\" data-background-color=\"green\">\n                          <i class=\"material-icons\"></i>\n                      </div>\n                      <div class=\"card-content\">\n                          <h4 class=\"card-title\">{{ this.helper.Lang().dispatch+' '+this.helper.Lang().user }}</h4>\n\n                         <!-- <img [src]=\"defaultProfilePic\" />-->\n                     <form   [formGroup]=\"tripRegisterForm\" >\n                              <div class=\"row\">\n                                  <div class=\"col-lg-5\" style=\"top: 18px;\">\n                                      <label class=\"control-label\">{{ this.helper.Lang().country+' '+this.helper.Lang().code }}</label>\n\n                                      <select class=\"\" style=\"display: block !important;width: 100%;  margin-top: 10px;\"   id=\"countryCode\" formControlName=\"country_code\"  (change)=\"getUser()\"  title=\"Country Code\" >\n                                          <option [value]=\"\" [selected]=\"true\" > {{ this.helper.Lang().country+' '+this.helper.Lang().code }}</option>\n                                          <option *ngFor=\"let country of country_details;\" [value]=\"country.dial_code\"  >{{ country.name }}</option>\n                                      </select>\n                                      <input type=\"hidden\" id=\"user_id\" #userid placeholder=\"\" formControlName=\"user_id\"  class=\"form-control\">\n\n                                      <label style=\"color:red;\" *ngIf=\"tripRegisterForm.controls.country_code.invalid && tripRegisterForm.controls.country_code.touched\">\n                                            {{ tripRegisterForm.controls.country_code.error_message }}\n                                          </label>\n\n                                  </div>\n                                  <div class=\"col-md-7\">\n                                      <!-- label-floating-->\n                                      <div class=\"form-group  is-empty\" id=\"phone\">\n                                          <label class=\"control-label\">{{ this.helper.Lang().phone+' '+this.helper.Lang().number }}</label>\n                                          <input type=\"text\"  (change)=\"getUser()\"  id=\"phone_number\" class=\"form-control\" formControlName=\"phone_number\" >\n                                          <span class=\"material-input\"></span></div>\n                                          <label style=\"color:red;\" *ngIf=\"tripRegisterForm.controls.phone_number.invalid && tripRegisterForm.controls.phone_number.touched\">\n                                            {{ tripRegisterForm.controls.phone_number.error_message }}\n                                          </label>\n                                        </div>\n                              </div>\n                              <div class=\"row\">\n                                  <div class=\"col-md-6\">\n                                      <div class=\"form-group is-empty\" id=\"fname\">\n                                          <label class=\"control-label\">{{ this.helper.Lang().first+' '+this.helper.Lang().name }}</label>\n                                          <input type=\"text\" class=\"form-control\" id=\"firstName\" formControlName=\"first_name\" placeholder=\"\"  >\n                                          <span class=\"material-input\"></span></div>\n                                          <label style=\"color:red;\" *ngIf=\"tripRegisterForm.controls.first_name.invalid && tripRegisterForm.controls.first_name.touched\">\n                                            {{ tripRegisterForm.controls.first_name.error_message }}\n                                          </label>\n                                  </div>\n                                  <div class=\"col-md-6\">\n                                      <div class=\"form-group is-empty\" id=\"lname\">\n                                          <label class=\"control-label\">{{ this.helper.Lang().last+' '+this.helper.Lang().name }}</label>\n                                          <input type=\"text\" class=\"form-control\" id=\"lastName\" formControlName=\"last_name\" placeholder=\"\"  >\n                                          <span class=\"material-input\"></span></div>\n                                         <label style=\"color:red;\" *ngIf=\"tripRegisterForm.controls.last_name.invalid && tripRegisterForm.controls.last_name.touched\">\n                                            {{ tripRegisterForm.controls.last_name.error_message }}</label>\n\n                                        </div>\n                              </div>\n                              <div class=\"row\">\n\n                                  <div class=\"col-md-12\">\n                                      <div class=\"form-group  is-empty \">\n                                          <label class=\"control-label\">{{ this.helper.Lang().pick_address }}</label>\n                                          <input type=\"text\" id=\"pickUpAddress\" #pickup placeholder=\"\" formControlName=\"pickup\" class=\"form-control\" autocorrect=\"off\" autocapitalize=\"off\" spellcheck=\"off\"   >\n                                          <input type=\"hidden\" id=\"pickLat\" #pickuplat  placeholder=\"\"  formControlName=\"pick_lat\"  class=\"form-control\">\n                                          <input type=\"hidden\" id=\"pickLng\" #pickuplng placeholder=\"\" formControlName=\"pick_lng\" class=\"form-control\">\n                                          <span class=\"material-input\"></span></div>\n                                      <label style=\"color:red;\" *ngIf=\"tripRegisterForm.controls.pickup.invalid && tripRegisterForm.controls.pickup.touched\">\n                                          {{ tripRegisterForm.controls.pickup.error_message }}</label>\n                                  </div>\n                              \n                                </div>\n                              <div class=\"row\">\n                                  <div class=\"col-md-12\">\n                                      <div class=\"form-group is-empty\">\n                                          <label class=\"control-label\">{{ this.helper.Lang().drop_address}}</label>\n                                          <input type=\"text\" id=\"DropOffAddress\"  placeholder=\"\" formControlName=\"drop\"  #drop class=\"form-control\" >\n                                          <input type=\"hidden\" id=\"dropLat\" #droplat placeholder=\"\" formControlName=\"drop_lat\"  class=\"form-control\">\n                                          <input type=\"hidden\" id=\"dropLng\" #droplng placeholder=\"\" formControlName=\"drop_lng\"  class=\"form-control\">\n                                          <span class=\"material-input\"></span></div>\n                                      <label style=\"color:red;\" *ngIf=\"tripRegisterForm.controls.drop.invalid && tripRegisterForm.controls.drop.touched\">\n                                          {{ tripRegisterForm.controls.drop.error_message }}</label>\n                                  </div>\n                              </div>\n                              <div class=\"row\">\n                                  <div class=\"col-lg-12 col-md-12 col-sm-12\">\n                                      <select  (change)=\"updateType($event)\" style=\"display:block !important;\"  formControlName=\"type\" #type title=\"Choose Type\" id=\"type\" ><!--(focus)=\"hasFocus = true\"-->\n                                          <option [ngValue]=\"\" disabled [selected]=\"true\">{{ this.helper.Lang().select+' '+this.helper.Lang().type }}</option>\n\n                                 <!--     <ng-container *ngIf=\"hasFocus\">-->\n                                 <!--         <option *ngFor=\" let type of zoneTypes; \" [ngValue]=\"type.driver_type_id\">{{type.driver_type_name}}</option>-->\n                                     <!-- </ng-container>-->\n                                      </select>\n                                      <label style=\"color:red;\" *ngIf=\"tripRegisterForm.controls.type.invalid && tripRegisterForm.controls.type.touched\">\n                                          {{ tripRegisterForm.controls.type.error_message }}</label>\n                                  </div>\n                              </div>\n                              <div class=\"row\">\n                                  <div class=\"col-lg-4 col-md-12 col-sm-12\"  >\n                              <button type=\"submit\" class=\"btn btn-primary center-block\" [disabled]=\"!tripRegisterForm.valid\" (click)=\"ride_now()\" >{{ this.helper.Lang().ride+' '+this.helper.Lang().now }}</button></div>\n                                  <div class=\"col-lg-4 col-md-12 col-sm-12\">\n                                  <button type=\"submit\"  class=\"btn btn-primary center-block\" [disabled]=\"!tripRegisterForm.valid\" (click)=\"ride_later()\">{{ this.helper.Lang().ride+' '+this.helper.Lang().later }}</button></div>\n                                  <div class=\"col-lg-4 col-md-12 col-sm-12\">\n                                      <button type=\"submit\"  class=\"btn btn-primary center-block\"  (click)=\"reset()\">{{ this.helper.Lang().reset }}</button>\n                                  <!--    <button type=\"submit\"  class=\"btn btn-primary center-block\"  (click)=\"sample()\">Sample</button>-->\n\n                                  </div>\n\n\n                                  <div class=\"clearfix\"></div>\n                          </div>\n                          </form>\n                      </div>\n                  </div>\n              </div>\n\n\n                  <div class=\"col-md-8\">\n                      <div id=\"mapDetailDiv\" style=\"display:none;position: absolute;width: 90%;font-weight: bold;\"><span><i class=\"material-icons\" style=\"line-height: 0.1;\">directions_car</i>  Distance - <span id=\"vDistance\">1234Km</span></span><span style=\"float: right;padding-left: 16px;\"><i class=\"material-icons\" style=\"line-height: 0.1;\">av_timer</i> Time - <span id=\"vTime\">123 Days</span></span></div>\n                      <div class=\"row\">\n                          <div class=\"col-md-12\">\n                              <div class=\"card\">\n                                  <div class=\"card-content\" style=\"padding: 8px 8px;\">\n                                      <div id=\"map\" #map style=\"height: 300px;margin-top:0px;\"></div>\n\n                                      <!--<ang-map></ang-map>-->\n                                  </div>\n                              </div>\n\n                          </div>\n                      </div>\n\n                      <div etaShow>\n\n                      </div>\n\n\n\n"

/***/ }),

/***/ "../../../../../src/app/dispatch/dispatch.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return DispatchComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__Core_Http_http__ = __webpack_require__("../../../../../src/app/Core/Http/http.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__Core_BaseComponent__ = __webpack_require__("../../../../../src/app/Core/BaseComponent.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__Core_baseConst__ = __webpack_require__("../../../../../src/app/Core/baseConst.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__Core_MapHandler_GoogleMap__ = __webpack_require__("../../../../../src/app/Core/MapHandler/GoogleMap.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__eta_eta_component__ = __webpack_require__("../../../../../src/app/eta/eta.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__Directive_EtaDirective__ = __webpack_require__("../../../../../src/app/Directive/EtaDirective.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__Directive_TriphandleDirective__ = __webpack_require__("../../../../../src/app/Directive/TriphandleDirective.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__triphandler_triphandler_component__ = __webpack_require__("../../../../../src/app/triphandler/triphandler.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__Directive_TriplaterDirective__ = __webpack_require__("../../../../../src/app/Directive/TriplaterDirective.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__triplater_triplater_component__ = __webpack_require__("../../../../../src/app/triplater/triplater.component.ts");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
//noinspection TypeScriptCheckImport







/*Eta*/


/*Triphandle view*/


/*Trip later*/


var DispatchComponent = /** @class */ (function (_super) {
    __extends(DispatchComponent, _super);
    function DispatchComponent(fb, http, router, resolver) {
        var _this = _super.call(this) || this;
        _this.fb = fb;
        _this.http = http;
        _this.router = router;
        _this.resolver = resolver;
        _this.country_details = "";
        return _this;
    }
    DispatchComponent.prototype.reset = function () {
        this.ngOnInit();
        this.ViewDestory(this, "triphandleview");
        this.ViewDestory(this, "etaview");
        this.ViewDestory(this, "triplaterview");
    };
    DispatchComponent.prototype.ngOnInit = function () {
        var no_timer_run = false;
        this.get_drivers_for_map(no_timer_run);
        this.country_details = __WEBPACK_IMPORTED_MODULE_5__Core_baseConst__["b" /* country */];
        this.createForm();
        this.set_default_drivers();
        this.MapHandler = __WEBPACK_IMPORTED_MODULE_6__Core_MapHandler_GoogleMap__["a" /* GoogleMap */].getHandler(google);
        this.mainMapObject = this.MapHandler.createmap(this.maparea, {
            zoom: 4,
            center: { lat: 11.09839384, lng: 76.845789475 }
        });
        this.MapHandler.setAutcomplete(this.pickup, { instance: this, callback: this.pickCallback });
        this.MapHandler.setAutcomplete(this.drop, { instance: this, callback: this.dropCallback });
        this.pickupMaker = this.MapHandler.createMarker({
            position: { lat: 11.465465542, lng: 657264524 },
            map: this.mainMapObject,
            title: "Pickup Marker",
            icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
        });
        this.pickupMaker.setVisible(false);
        this.dropMarker = this.MapHandler.createMarker({
            position: { lat: 11.465465542, lng: 657264524 },
            map: this.mainMapObject,
            title: "Drop Marker",
            icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
        });
        this.dropMarker.setVisible(false);
        this.get_drivers_for_map(true);
    };
    DispatchComponent.prototype.ngOnDestroy = function () {
        var array_timer = [];
        array_timer.push(this.driver_get_timer);
        //  console.log("ons");
        this.helper.stop_timer(array_timer);
    };
    DispatchComponent.prototype.pickCallback = function (object, place) {
        var place = place.getPlace();
        if (place.geometry.viewport) {
            object.mainMapObject.fitBounds(place.geometry.viewport);
            object.pickupMaker.setPosition(place.geometry.location);
            object.pickupMaker.setVisible(true);
            object.pickuplat.nativeElement.value = place.geometry.location.lat();
            object.pickuplng.nativeElement.value = place.geometry.location.lng();
            object.tripRegisterForm.get('pick_lat').setValue(place.geometry.location.lat());
            object.tripRegisterForm.get('pick_lng').setValue(place.geometry.location.lng());
            //native hold the reference of element
            object.tripRegisterForm.get('pickup').setValue(object.pickup.nativeElement.value);
        }
        if (object.drop.nativeElement.value != '' && object.droplat.nativeElement.value != '' && object.droplng.nativeElement.value) {
            object.drawPath(object);
        }
    };
    DispatchComponent.prototype.set_drivers_for_map = function (object, response) {
        if (response.success) {
            var type_check = 0;
            if (object.tripRegisterForm.value.type != '') {
                //type id
                type_check = object.tripRegisterForm.value.type;
            }
            object.MapHandler.driver_marker_array(object, response, type_check);
        }
        else {
            object.MapHandler.remove_driver_marker();
        }
    };
    DispatchComponent.prototype.get_drivers_for_map = function (timer_run) {
        var _this = this;
        var param = this.get_driver_map_param();
        if (timer_run) {
            this.driver_get_timer = setInterval(function () {
                _this.http.postData(_this.helper.getConst().driver_map, param, { object: _this, complete: _this.set_drivers_for_map });
            }, 5000);
        }
        else {
            this.http.postData(this.helper.getConst().driver_map, param, { object: this, complete: this.set_drivers_for_map });
        }
    };
    DispatchComponent.prototype.dropCallback = function (object, place) {
        var place = place.getPlace();
        if (place.geometry.viewport) {
            object.mainMapObject.fitBounds(place.geometry.viewport);
            object.dropMarker.setPosition(place.geometry.location);
            object.dropMarker.setVisible(true);
            object.droplat.nativeElement.value = place.geometry.location.lat();
            object.droplng.nativeElement.value = place.geometry.location.lng();
            object.tripRegisterForm.get('drop_lat').setValue(place.geometry.location.lat());
            object.tripRegisterForm.get('drop_lng').setValue(place.geometry.location.lng());
            object.tripRegisterForm.get('drop').setValue(object.drop.nativeElement.value);
        }
        if (object.pickup.nativeElement.value != '' && object.pickuplat.nativeElement.value != '' && object.pickuplng.nativeElement.value) {
            object.drawPath(object);
        }
    };
    DispatchComponent.prototype.drawPath = function (object) {
        object.MapHandler.drawdirection({
            origin: { lat: object.pickupMaker.getPosition().lat(), lng: object.pickupMaker.getPosition().lng() },
            destination: { lat: object.dropMarker.getPosition().lat(), lng: object.dropMarker.getPosition().lng() },
            map: object.mainMapObject
        });
        object.http.postData(object.helper.getConst().zonetype, {
            id: object.helper.system_settings.id,
            token: object.helper.system_settings.token,
            latitude: object.pickuplat.nativeElement.value,
            longitude: object.pickuplng.nativeElement.value
        }, { object: object, error_priority: 5, complete: object.renderTypes });
        object.ViewDestory(object, "etaview");
    };
    DispatchComponent.prototype.ViewDestory = function (object, param) {
        if (object[param]) {
            object[param].destroy();
        }
    };
    DispatchComponent.prototype.set_default_drivers = function () {
        var element = document.getElementById('type');
        element.innerHTML = "<option value='' selected>" + this.helper.Lang().select + " " + this.helper.Lang().type + "</option>";
    };
    DispatchComponent.prototype.sample = function () {
        this.loader.nativeElement.style.display = "block";
    };
    DispatchComponent.prototype.renderTypes = function (object, data) {
        //console.log(data);
        if (data.success == true) {
            // object.zoneTypes = data.driver_types_available_on_zone;
            var car_type = data.driver_types_available_on_zone;
            var element = document.getElementById('type');
            element.innerHTML = "<option value='' selected>" + object.helper.Lang().select + " " + object.helper.Lang().type + "</option>";
            for (var i = 0; i < car_type.length; i++) {
                var opt = document.createElement("OPTION");
                opt.setAttribute("value", car_type[i].driver_type_id);
                var t = document.createTextNode(car_type[i].driver_type_name);
                opt.appendChild(t);
                element.appendChild(opt);
            }
        }
        else {
            var element = document.getElementById('type');
            element.innerHTML = "<option value='' selected>" + object.helper.Lang().select + " " + object.helper.Lang().type + "</option>";
            //   alert(object.helper.Lang().no_service);
            object.helper.http_error_handler(null, null, 7);
            object.tripRegisterForm.get("type").setValue("");
        }
    };
    DispatchComponent.prototype.renderEta = function (object, data) {
        if (data.success == true) {
            var componentFactory = object.resolver.resolveComponentFactory(__WEBPACK_IMPORTED_MODULE_7__eta_eta_component__["a" /* EtaComponent */]);
            var viewContainerRef = object.etaArea.viewContainerRef;
            var view = viewContainerRef.createComponent(componentFactory);
            view.instance['data'] = data;
            view.instance['object'] = object;
            object.etaview = view;
            // console.log(data);
        }
        else {
            object.helper.showNotification({ from: "top", align: "center", type: "danger", message: data.error_message });
        }
    };
    DispatchComponent.prototype.updateType = function (event) {
        this.ViewDestory(this, "etaview");
        this.http.postData(this.helper.getConst().eta, {
            id: this.helper.system_settings.id,
            token: this.helper.system_settings.token,
            type_id: event.target.value,
            olat: this.pickuplat.nativeElement.value,
            olng: this.pickuplng.nativeElement.value,
            dlat: this.droplat.nativeElement.value,
            dlng: this.droplng.nativeElement.value
        }, {
            object: this, error_priority: 1, complete: this.renderEta
        });
    };
    DispatchComponent.prototype.createForm = function () {
        this.tripRegisterForm = this.fb.group({
            country_code: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required]],
            phone_number: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required, __WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].pattern('^[0-9]*$')]],
            user_id: [''],
            first_name: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required, __WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].pattern('^[a-zA-Z]*$')]],
            last_name: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required, __WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].pattern('^[a-zA-Z]*$')]],
            type: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required]],
            drop: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required]],
            pickup: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required]],
            pick_lat: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required]],
            pick_lng: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required]],
            drop_lat: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required]],
            drop_lng: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required]],
        });
        //  this.tripRegisterForm.controls['last_name'].markAsPristine();
        this.helper.setValidatorMessage(this.tripRegisterForm, [
            {
                formName: "country_code",
                message: {
                    "required": this.helper.Lang().country_code_required,
                }
            },
            {
                formName: "first_name",
                message: {
                    "required": this.helper.Lang().first_name_required,
                    "pattern": this.helper.Lang().albhabet_only,
                }
            },
            {
                formName: "last_name",
                message: {
                    "required": this.helper.Lang().last_name_required,
                    "pattern": this.helper.Lang().albhabet_only,
                }
            },
            {
                formName: "phone_number",
                message: {
                    "required": this.helper.Lang().phone_number_required,
                    "pattern": this.helper.Lang().phone_must_number,
                }
            },
            {
                formName: "pickup",
                message: {
                    "required": this.helper.Lang().pick_address_required,
                }
            },
            {
                formName: "drop",
                message: {
                    "required": this.helper.Lang().drop_address_required,
                }
            },
            {
                formName: "type",
                message: {
                    "required": this.helper.Lang().type_required,
                }
            }
        ]);
    };
    DispatchComponent.prototype.ride_now = function () {
        if (this.tripRegisterForm.value.pick_lat != "" && this.tripRegisterForm.value.pick_lng != "" && this.tripRegisterForm.value.drop_lat != "" &&
            this.tripRegisterForm.value.drop_lng != "" && this.tripRegisterForm.value.type != "" &&
            this.tripRegisterForm.value.pickup != "" && this.tripRegisterForm.value.drop != "" && this.tripRegisterForm.value.first_name != "" &&
            this.tripRegisterForm.value.last_name != "" && this.tripRegisterForm.value.country_code != "" && this.tripRegisterForm.value.phone_number != "") {
            var param = this.ridenow_param(this.tripRegisterForm);
            this.http.postData(this.helper.getConst().createrequest, param, { object: this, complete: this.trip_handle });
        }
        else {
            alert(this.helper.Lang().no_empty_fields);
        }
    };
    DispatchComponent.prototype.trip_handle = function (trip_object, trip_data) {
        /*console.log("tb");
        console.log(trip_object);
        console.log("td");
        console.log(trip_data);*/
        if (trip_data.success) {
            var componentFactor = trip_object.resolver.resolveComponentFactory(__WEBPACK_IMPORTED_MODULE_10__triphandler_triphandler_component__["a" /* TriphandlerComponent */]);
            var viewcontainerref = trip_object.triphandleArea.viewContainerRef;
            var view = viewcontainerref.createComponent(componentFactor);
            view.instance['data'] = trip_data;
            view.instance['object'] = trip_object;
            trip_object.triphandleview = view;
        }
        else {
            trip_object.helper.showNotification({ from: "top", align: "center", type: "danger", message: trip_data.error_message });
        }
    };
    DispatchComponent.prototype.ride_later = function () {
        if (this.tripRegisterForm.value.pick_lat != "" && this.tripRegisterForm.value.pick_lng != "" && this.tripRegisterForm.value.drop_lat != "" &&
            this.tripRegisterForm.value.drop_lng != "" && this.tripRegisterForm.value.type != "" &&
            this.tripRegisterForm.value.pickup != "" && this.tripRegisterForm.value.drop != "" && this.tripRegisterForm.value.first_name != "" &&
            this.tripRegisterForm.value.last_name != "" && this.tripRegisterForm.value.country_code != "" && this.tripRegisterForm.value.phone_number != "") {
            var componentFactor = this.resolver.resolveComponentFactory(__WEBPACK_IMPORTED_MODULE_12__triplater_triplater_component__["a" /* TriplaterComponent */]);
            var viewcontainerref = this.triplaterArea.viewContainerRef;
            var view = viewcontainerref.createComponent(componentFactor);
            view.instance['data'] = this;
            this.triplaterview = view;
        }
        else {
            alert(this.helper.Lang().no_empty_fields);
        }
    };
    DispatchComponent.prototype.getUser = function () {
        if (this.tripRegisterForm.value.country_code == undefined || this.tripRegisterForm.value.country_code == null || this.tripRegisterForm.value.country_code == '' || this.tripRegisterForm.value.phone_number == '' || this.tripRegisterForm.value.phone_number == null || this.tripRegisterForm.value.phone_number == undefined) {
        }
        else {
            this.phone_number = this.tripRegisterForm.value.country_code + this.tripRegisterForm.value.phone_number;
            this.id = this.helper.system_settings.id;
            this.token = this.helper.system_settings.token;
            this.param = this.get_user_param(this.id, this.token, this.phone_number);
            this.http.postData(this.helper.getConst().userdetail, this.param, { object: this, complete: this.setUser });
        }
    };
    DispatchComponent.prototype.setUser = function (object, response) {
        //   console.log(response);
        if (response.success) {
            object.tripRegisterForm.get('first_name').setValue(response.user.first_name);
            object.tripRegisterForm.get('last_name').setValue(response.user.last_name);
            object.tripRegisterForm.get('user_id').setValue(response.user.id);
        }
        else {
            object.tripRegisterForm.get('first_name').setValue("");
            object.tripRegisterForm.get('last_name').setValue("");
            object.tripRegisterForm.get('user_id').setValue(0);
        }
    };
    DispatchComponent.prototype.get_user_param = function (id, token, phone_number) {
        return {
            id: id,
            token: token,
            phone_number: phone_number
        };
    };
    DispatchComponent.prototype.ridenow_param = function (data) {
        var phone_number = (data.value.country_code + "" + data.value.phone_number).replace(/ /g, "");
        return {
            id: this.helper.system_settings.id,
            token: this.helper.system_settings.token,
            platitude: data.value.pick_lat,
            plongitude: data.value.pick_lng,
            dlatitude: data.value.drop_lat,
            dlongitude: data.value.drop_lng,
            payment_opt: 1,
            type: data.value.type,
            user_id: data.value.user_id,
            pick_location: data.value.pickup,
            drop_location: data.value.drop,
            firstname: data.value.first_name,
            lastname: data.value.last_name,
            phone_number: phone_number,
            timezone: this.helper.getConst().timezone,
        };
    };
    DispatchComponent.prototype.get_driver_map_param = function () {
        return {
            id: this.helper.system_settings.id,
            token: this.helper.system_settings.token,
        };
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('map'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], DispatchComponent.prototype, "maparea", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('pickup'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], DispatchComponent.prototype, "pickup", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('drop'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], DispatchComponent.prototype, "drop", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('pickuplat'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], DispatchComponent.prototype, "pickuplat", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('pickuplng'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], DispatchComponent.prototype, "pickuplng", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('droplat'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], DispatchComponent.prototype, "droplat", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('droplng'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], DispatchComponent.prototype, "droplng", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('type'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], DispatchComponent.prototype, "type", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('loader'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], DispatchComponent.prototype, "loader", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])(__WEBPACK_IMPORTED_MODULE_8__Directive_EtaDirective__["a" /* EtaDirective */]),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_8__Directive_EtaDirective__["a" /* EtaDirective */])
    ], DispatchComponent.prototype, "etaArea", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])(__WEBPACK_IMPORTED_MODULE_9__Directive_TriphandleDirective__["a" /* TriphandleDirective */]),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_9__Directive_TriphandleDirective__["a" /* TriphandleDirective */])
    ], DispatchComponent.prototype, "triphandleArea", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])(__WEBPACK_IMPORTED_MODULE_11__Directive_TriplaterDirective__["a" /* TriplaterDirective */]),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_11__Directive_TriplaterDirective__["a" /* TriplaterDirective */])
    ], DispatchComponent.prototype, "triplaterArea", void 0);
    DispatchComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-dispatch',
            template: __webpack_require__("../../../../../src/app/dispatch/dispatch.component.html"),
            styles: [__webpack_require__("../../../../../src/app/dispatch/dispatch.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["a" /* FormBuilder */], __WEBPACK_IMPORTED_MODULE_2__Core_Http_http__["a" /* Http */], __WEBPACK_IMPORTED_MODULE_4__angular_router__["b" /* Router */], __WEBPACK_IMPORTED_MODULE_0__angular_core__["p" /* ComponentFactoryResolver */]])
    ], DispatchComponent);
    return DispatchComponent;
}(__WEBPACK_IMPORTED_MODULE_3__Core_BaseComponent__["a" /* BaseComponent */]));



/***/ }),

/***/ "../../../../../src/app/dyanmic/dyanmic.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/dyanmic/dyanmic.component.html":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "../../../../../src/app/dyanmic/dyanmic.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return DyanmicComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var DyanmicComponent = /** @class */ (function () {
    function DyanmicComponent(viewContainerRef) {
        this.viewContainerRef = viewContainerRef;
    }
    DyanmicComponent.prototype.ngOnInit = function () {
    };
    DyanmicComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-dyanmic',
            template: __webpack_require__("../../../../../src/app/dyanmic/dyanmic.component.html"),
            styles: [__webpack_require__("../../../../../src/app/dyanmic/dyanmic.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_0__angular_core__["_11" /* ViewContainerRef */]])
    ], DyanmicComponent);
    return DyanmicComponent;
}());



/***/ }),

/***/ "../../../../../src/app/error-component/error-component.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "#overlay {\n    position: fixed;\n    display: block;\n    width: 100%;\n    height: 100%;\n    top: 0;\n    left: 0;\n    right: 0;\n    bottom: 0;\n    background-color: rgba(0,0,0,0.5);\n    z-index: 99999;\n    cursor: pointer;\n}", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/error-component/error-component.component.html":
/***/ (function(module, exports) {

module.exports = "<div id=\"overlay\" >\n  <div style=\"    margin-left: 27%;\n    margin-top: 20%;\n    font-size: 37px;\">{{post}}</div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/error-component/error-component.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ErrorComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var ErrorComponent = /** @class */ (function () {
    function ErrorComponent(viewContainerRef) {
        this.viewContainerRef = viewContainerRef;
    }
    ErrorComponent.prototype.ngOnInit = function () {
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["D" /* Input */])(),
        __metadata("design:type", Object)
    ], ErrorComponent.prototype, "post", void 0);
    ErrorComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-error-component',
            template: __webpack_require__("../../../../../src/app/error-component/error-component.component.html"),
            styles: [__webpack_require__("../../../../../src/app/error-component/error-component.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_0__angular_core__["_11" /* ViewContainerRef */]])
    ], ErrorComponent);
    return ErrorComponent;
}());



/***/ }),

/***/ "../../../../../src/app/eta/eta.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/eta/eta.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"row\" #eta1 id=\"rateCard1\" style=\"display: block;\">\n  <div class=\"col-md-12\" style=\"top:-46px;\">\n    <div class=\"card card-pricing card-raised\">\n      <div class=\"content\" style=\"padding: 8px 8px;height: 196px;\">\n        <!--<h6 class=\"category\" style=\"text-align: center;width: 100%;\" id=\"typeTitle\">Small Company</h6>-->\n        <div class=\"row\">\n          <div class=\"col-md-10\">\n            <table class=\"table custom-table\">\n              <tbody>\n              <tr>\n\n                <td style=\"padding: 3px 12px !important;\">{{ this.object.helper.Lang().base+' '+this.object.helper.Lang().price }}</td><td style=\"padding: 3px 12px !important;\" id=\"vBasePrice\">$ {{data.base_price  | number:'1.2'}}</td>\n\n              </tr>\n              <tr>\n\n                <td style=\"padding: 3px 12px !important;\">{{ this.object.helper.Lang().distance+' '+this.object.helper.Lang().price }}</td><td id=\"vDistancePrice\" style=\"padding: 3px 12px !important;\">$ {{data.distance_price | number:'1.2'}}</td>\n\n              </tr>\n              <tr>\n\n                <td style=\"padding: 3px 12px !important;\">{{ this.object.helper.Lang().time+' '+this.object.helper.Lang().price }}</td><td id=\"vTimePrice\" style=\"padding: 3px 12px !important;\">$ {{data.time_price  | number:'1.2'}}</td>\n              </tr>\n              <tr>\n\n                <td style=\"padding: 3px 12px !important;\">{{ this.object.helper.Lang().tax }}</td><td  style=\"padding: 3px 12px !important;\">$ {{data.tax  | number:'1.2'}}</td>\n\n              </tr>\n              <tr>\n\n                <td style=\"padding: 3px 12px !important;\">{{ this.object.helper.Lang().total+' '+this.object.helper.Lang().price }}</td><td id=\"vTotalPrice\" style=\"padding: 3px 12px !important;\">$ {{data.total  | number:'1.2'}}</td>\n\n              </tr>\n              </tbody>\n            </table>\n          </div>\n\n          <div class=\"col-md-2\">\n            <div class=\"custom-icon\" style=\"background-color: #9c27b0;border-radius: 22%;cursor: pointer;\" (click)=\"toggleside('side1')\" >\n              <i class=\"material-icons icon-mt-5 icon-white\" style=\"margin-top: 5px;color:white;\">arrow_forward</i>\n            </div>\n\n          </div>\n\n        </div>\n\n\n\n\n      </div>\n    </div>\n  </div>\n</div>\n\n\n<div class=\"row\" id=\"rateCard2\" #eta2  style=\"display: none;\">\n  <div class=\"col-md-12\" style=\"top:-46px;\">\n    <div class=\"card card-pricing card-raised\">\n      <div class=\"content\" style=\"padding: 8px 8px;height: 196px;\">\n       <!-- <h6 class=\"category\" style=\"width: 100%;\" id=\"typeTitle1\" >Small Company</h6>-->\n        <div class=\"row\">\n          <div class=\"col-md-4\">\n            <table class=\"table custom-table\">\n              <tbody>\n\n              <tr>\n                <td style=\"padding: 3px 12px !important;\">{{ this.object.helper.Lang().base+' '+this.object.helper.Lang().distance }}</td><td id=\"vbaseDistance\" style=\"padding: 3px 12px !important;\">{{data.base_distance}} Kms</td>\n              </tr>\n             <!-- <tr>\n                <td style=\"padding: 3px 12px !important;\">Max Size</td><td style=\"padding: 3px 12px !important;\" id=\"vMaxSize\">20 (persons)</td>\n              </tr>-->\n              </tbody>\n            </table>\n          </div>\n\n          <div class=\"col-md-6\">\n            <table class=\"table custom-table\">\n              <tbody>\n              <tr>\n                <td style=\"padding: 3px 12px !important;\">{{ this.object.helper.Lang().base+' '+this.object.helper.Lang().price }}</td><td id=\"vBasePrice1\" style=\"padding: 3px 12px !important;\">$ {{data.base_price  | number:'1.2'}}</td>\n              </tr>\n              <tr>\n                <td style=\"padding: 3px 12px !important;\">{{ this.object.helper.Lang().price+' '+this.object.helper.Lang().per+' '+this.object.helper.Lang().distance }}</td><td id=\"vDistanceBPrice\" style=\"padding: 3px 12px !important;\">$ {{data.price_per_distance  | number:'1.2'}}</td>\n              </tr>\n              <tr>\n                <td style=\"padding: 3px 12px !important;\">{{ this.object.helper.Lang().price+' '+this.object.helper.Lang().per+' '+this.object.helper.Lang().time }}</td><td id=\"vTimeBPrice\" style=\"padding: 3px 12px !important;\">$ {{data.price_per_time  | number:'1.2'}}</td>\n              </tr>\n              </tbody>\n            </table>\n          </div>\n\n          <div class=\"col-md-2\">\n            <div class=\"custom-icon\" style=\"background-color: #9c27b0;border-radius: 22%;cursor: pointer;\" (click)=\"toggleside('side2')\" >\n              <i class=\"material-icons icon-mt-5 icon-white\" style=\"margin-top: 5px;color:white;\">arrow_back</i>\n            </div>\n\n          </div>\n\n        </div>\n\n      </div>\n    </div>\n  </div>\n</div>\n\n\n"

/***/ }),

/***/ "../../../../../src/app/eta/eta.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return EtaComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var EtaComponent = /** @class */ (function () {
    function EtaComponent() {
    }
    EtaComponent.prototype.toggleside = function (area) {
        if (area == 'side1') {
            this.eta1.nativeElement.style.display = "none";
            this.eta2.nativeElement.style.display = "block";
        }
        else {
            this.eta1.nativeElement.style.display = "block";
            this.eta2.nativeElement.style.display = "none";
        }
    };
    EtaComponent.prototype.ngOnInit = function () {
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["D" /* Input */])(),
        __metadata("design:type", Object)
    ], EtaComponent.prototype, "data", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["D" /* Input */])(),
        __metadata("design:type", Object)
    ], EtaComponent.prototype, "object", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('eta1'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], EtaComponent.prototype, "eta1", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('eta2'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], EtaComponent.prototype, "eta2", void 0);
    EtaComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-eta',
            template: __webpack_require__("../../../../../src/app/eta/eta.component.html"),
            styles: [__webpack_require__("../../../../../src/app/eta/eta.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], EtaComponent);
    return EtaComponent;
}());



/***/ }),

/***/ "../../../../../src/app/home/home.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/home/home.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"wrapper\">\n  <app-sidebar></app-sidebar>\n  <div class=\"main-panel\" style=\"width: 100%;float:left;\">\n    <app-navbar></app-navbar>\n    <div style=\"margin-top: 7%;\">\n      <router-outlet ></router-outlet>\n    </div>\n    \n  </div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/home/home.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return HomeComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var HomeComponent = /** @class */ (function () {
    function HomeComponent() {
    }
    HomeComponent.prototype.ngOnInit = function () {
    };
    HomeComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-home',
            template: __webpack_require__("../../../../../src/app/home/home.component.html"),
            styles: [__webpack_require__("../../../../../src/app/home/home.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], HomeComponent);
    return HomeComponent;
}());



/***/ }),

/***/ "../../../../../src/app/login/login.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/login/login.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"wrapper wrapper-full-page\">\n  <nav class=\"navbar navbar-primary navbar-transparent navbar-fixed-top\">\n    <div class=\"container\">\n      <div class=\"navbar-header\">\n        <button class=\"navbar-toggle\" data-target=\"#menu-example\" data-toggle=\"collapse\" type=\"button\">\n          <span class=\"sr-only\">Toggle navigation</span>\n          <span class=\"icon-bar\"></span>\n          <span class=\"icon-bar\"></span>\n          <span class=\"icon-bar\"></span>\n        </button>\n        <a class=\"navbar-brand\" href=\"/#/\">{{this.helper.getConst().app_name}}</a>\n      </div>\n\n    </div>\n  </nav>\n  <div class=\"full-page login-page\" filter-color=\"black\">\n\n    <div class=\"content\">\n      <div class=\"container\">\n        <div class=\"row\">\n          <div class=\"col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3\">\n            <form action=\"#\" method=\"#\" novalidate=\"\" class=\"ng-untouched ng-pristine ng-valid\" [formGroup]=\"loginForm\" (ngSubmit)=\"test()\">\n              <div class=\"card card-login\">\n                <div class=\"card-header text-center\" data-background-color=\"rose\">\n                  <h4 class=\"card-title\">{{this.helper.Lang().login}}</h4>\n                </div>\n                <div class=\"card-content\">\n                  <div class=\"input-group\">\n                    <span class=\"input-group-addon\">\n                        <i class=\"material-icons\">mail</i>\n                    </span>\n                    <div id=\"{{ loginForm.controls.email_address.invalid && loginForm.controls.email_address.touched?'has-error':'' }}\" class=\"form-group label-floating\">\n                      <label class=\"control-label\">{{this.helper.Lang().email}}</label>\n                      <input class=\"form-control\" formControlName=\"email_address\" type=\"text\">\n                      <label style=\"color:red;\" *ngIf=\"loginForm.controls.email_address.invalid && loginForm.controls.email_address.touched\">\n                        {{ loginForm.controls.email_address.error_message }}\n                      </label>\n                    </div>\n\n                  </div>\n                  <div class=\"input-group\">\n                      <span class=\"input-group-addon\">\n                          <i class=\"material-icons\">lock_outline</i>\n                      </span>\n                    <div  id=\"{{ loginForm.controls.password.invalid && loginForm.controls.password.touched?'has-error':'' }}\" class=\"form-group label-floating\">\n                      <label class=\"control-label\">{{this.helper.Lang().password}}</label>\n                      <input class=\"form-control\" type=\"password\" formControlName=\"password\">\n                      <label style=\"color:red;\" *ngIf=\"loginForm.controls.password.invalid && loginForm.controls.password.touched\">\n                        {{ loginForm.controls.password.error_message}}\n                      </label>\n                    </div>\n                  </div>\n                </div>\n\n                <div class=\"footer text-center\">\n                  <button   class=\"btn btn-rose btn-simple btn-wd btn-lg\"  type=\"submit\">{{this.helper.Lang().login_submit}}</button>\n\n                </div>\n              </div>\n            </form>\n          </div>\n        </div>\n      </div>\n    </div>\n    <footer class=\"footer\">\n\n    </footer>\n    <div class=\"full-page-background\" style=\"background-image: url(../dispatcher/assets/img/login.jpeg) \"></div>\n  </div>\n</div>\n\n"

/***/ }),

/***/ "../../../../../src/app/login/login.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return LoginComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__Core_Http_http__ = __webpack_require__("../../../../../src/app/Core/Http/http.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__Core_BaseComponent__ = __webpack_require__("../../../../../src/app/Core/BaseComponent.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var LoginComponent = /** @class */ (function (_super) {
    __extends(LoginComponent, _super);
    function LoginComponent(fb, http, viewContainerRef, router) {
        var _this = _super.call(this) || this;
        _this.fb = fb;
        _this.http = http;
        _this.viewContainerRef = viewContainerRef;
        _this.router = router;
        _this.title = 'app';
        _this.submitButton = false;
        return _this;
    }
    LoginComponent.prototype.test = function () {
        //console.log(this.loginForm);
        this.submitButton = true;
        this.http.postData(this.helper.getConst().login, this.loginForm.value, { object: this, complete: this.loginFunction });
    };
    LoginComponent.prototype.loginFunction = function (object, response) {
        object.submitButton = false;
        if (response.success) {
            object.helper.setConfig(response.dispatcher);
            object.router.navigate(['home']);
        }
        else {
            object.helper.showNotification({ from: "top", align: "center", message: response.error_message, type: "danger" });
        }
    };
    LoginComponent.prototype.ngOnInit = function () {
        this.createForm();
    };
    LoginComponent.prototype.createForm = function () {
        this.loginForm = this.fb.group({
            email_address: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required, __WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].email]],
            password: ['', [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].required, __WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].minLength(6), __WEBPACK_IMPORTED_MODULE_1__angular_forms__["f" /* Validators */].maxLength(12)]]
        });
        this.helper.setValidatorMessage(this.loginForm, [
            { formName: "email_address",
                message: {
                    "required": this.helper.Lang().email_required,
                    "email": this.helper.Lang().email_invalid,
                }
            },
            {
                formName: "password",
                message: {
                    "required": this.helper.Lang().password_required,
                    "minlength": this.helper.Lang().password_min_length,
                    "maxlength": this.helper.Lang().password_max_length,
                }
            }
        ]);
    };
    LoginComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-login',
            template: __webpack_require__("../../../../../src/app/login/login.component.html"),
            styles: [__webpack_require__("../../../../../src/app/login/login.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["a" /* FormBuilder */], __WEBPACK_IMPORTED_MODULE_2__Core_Http_http__["a" /* Http */], __WEBPACK_IMPORTED_MODULE_0__angular_core__["_11" /* ViewContainerRef */], __WEBPACK_IMPORTED_MODULE_4__angular_router__["b" /* Router */]])
    ], LoginComponent);
    return LoginComponent;
}(__WEBPACK_IMPORTED_MODULE_3__Core_BaseComponent__["a" /* BaseComponent */]));



/***/ }),

/***/ "../../../../../src/app/redirect/redirect.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/redirect/redirect.component.html":
/***/ (function(module, exports) {

module.exports = "<p>\n  redirect works!\n</p>\n"

/***/ }),

/***/ "../../../../../src/app/redirect/redirect.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return RedirectComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var RedirectComponent = /** @class */ (function () {
    function RedirectComponent() {
        alert("i am in redirect");
        //console.log(this.route);
    }
    RedirectComponent.prototype.ngOnInit = function () {
    };
    RedirectComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-redirect',
            template: __webpack_require__("../../../../../src/app/redirect/redirect.component.html"),
            styles: [__webpack_require__("../../../../../src/app/redirect/redirect.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], RedirectComponent);
    return RedirectComponent;
}());



/***/ }),

/***/ "../../../../../src/app/schedule-edit/schedule-edit.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/schedule-edit/schedule-edit.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"row\">\n  <div class=\"col-md-8 col-md-offset-2\">\n    <div class=\"card\">\n      <div class=\"card-content\">\n        <h4 class=\"card-title\">{{ this.helper.Lang().schedule+' '+this.helper.Lang().details }}</h4>\n\n\n        <form [formGroup]=\"scheduleEditForm\" >\n        <input type=\"hidden\" #request_id formControlName=\"request_id\">\n        <input type=\"hidden\" #timezone formControlName=\"timezone\">\n          <div class=\"row\">\n\n            <div class=\"col-md-12\">\n              <div class=\"form-group  is-empty\" id=\"phone\">\n              <label class=\"control-label\">{{ this.helper.Lang().phone+' '+this.helper.Lang().number }}</label>\n                <input type=\"text\"  (change)=\"getUser()\" #phone id=\"phone_number\" class=\"form-control\" formControlName=\"phone_number\" >\n                <span class=\"material-input\"></span></div>\n              <label style=\"color:red;\" *ngIf=\"scheduleEditForm.controls.phone_number.invalid && scheduleEditForm.controls.phone_number.touched\">\n                {{ scheduleEditForm.controls.phone_number.error_message }}\n              </label>\n            </div>\n\n\n          </div>\n          <div class=\"row\">\n            <div class=\"col-md-6\">\n              <div class=\"form-group is-empty\" id=\"fname\">\n                <label class=\"control-label\">{{ this.helper.Lang().first+' '+this.helper.Lang().name }}</label>\n                <input type=\"text\" class=\"form-control\" id=\"firstName\" formControlName=\"first_name\" placeholder=\"\"  >\n                <span class=\"material-input\"></span></div>\n              <label style=\"color:red;\" *ngIf=\"scheduleEditForm.controls.first_name.invalid && scheduleEditForm.controls.first_name.touched\">\n                {{ scheduleEditForm.controls.first_name.error_message }}\n              </label>\n            </div>\n            <div class=\"col-md-6\">\n              <div class=\"form-group is-empty\" id=\"lname\">\n                <label class=\"control-label\">{{ this.helper.Lang().last+' '+this.helper.Lang().name }}</label>\n                <input type=\"text\" class=\"form-control\" id=\"lastName\" formControlName=\"last_name\" placeholder=\"\"  >\n                <span class=\"material-input\"></span></div>\n              <label style=\"color:red;\" *ngIf=\"scheduleEditForm.controls.last_name.invalid && scheduleEditForm.controls.last_name.touched\">\n                {{ scheduleEditForm.controls.last_name.error_message }}</label>\n\n            </div>\n          </div>\n\n          <div class=\"row\">\n\n            <div class=\"col-md-6\">\n              <div class=\"form-group  is-empty\" id=\"trip_start_date\">\n                <label class=\"control-label\">{{ this.helper.Lang().start+' '+this.helper.Lang().date }}</label>\n               <!-- <input type=\"text\" class=\"form-control\" id=\"\" #start_date formControlName=\"trip_start_date\" placeholder=\"\"  >-->\n                <input\n                        class=\"form-control\"\n                        [minDate]=\"minDate\"\n\n                        bsDatepicker\n                        [bsConfig]=\"{ dateInputFormat: 'YYYY-MM-DD' }\"\n                        placeholder=\"Start Date\"\n                        #start_date\n                        formControlName=\"trip_start_date\"\n                >\n\n\n\n                <span class=\"material-input\"></span></div>\n              <label style=\"color:red;\" *ngIf=\"scheduleEditForm.controls.trip_start_date.invalid && scheduleEditForm.controls.trip_start_date.touched\">\n                {{ scheduleEditForm.controls.trip_start_date.error_message }}\n              </label>\n            </div>\n\n            <div class=\"col-md-6\">\n              <div class=\"form-group  is-empty\" id=\"trip_start_time\">\n                <label class=\"control-label\">{{ this.helper.Lang().start+' '+this.helper.Lang().time }}</label>\n                <timepicker formControlName=\"trip_start_time\" #start_time value=\"\" ></timepicker>\n                <span class=\"material-input\"></span></div>\n              <label style=\"color:red;\" *ngIf=\"scheduleEditForm.controls.trip_start_time.invalid && scheduleEditForm.controls.trip_start_time.touched\">\n                {{ scheduleEditForm.controls.trip_start_time.error_message }}\n              </label>\n            </div>\n\n          </div>\n\n\n\n\n            <div class=\"row\">\n\n            <div class=\"col-md-12\">\n              <div class=\"form-group  is-empty \">\n                <label class=\"control-label\">{{ this.helper.Lang().pick_address }}</label>\n                <input type=\"text\" id=\"pickUpAddress\" #pickup placeholder=\"\" formControlName=\"pickup\" class=\"form-control\" autocorrect=\"off\" autocapitalize=\"off\" spellcheck=\"off\"  readonly>\n                <!--<input type=\"hidden\" id=\"pickUpAddress\" #pickup placeholder=\"\" formControlName=\"pickup\" class=\"form-control\" autocorrect=\"off\" autocapitalize=\"off\" spellcheck=\"off\"   >-->\n                <input type=\"hidden\" id=\"pickLat\" #pickuplat  placeholder=\"\"  formControlName=\"pick_lat\"  class=\"form-control\">\n                <input type=\"hidden\" id=\"pickLng\" #pickuplng placeholder=\"\" formControlName=\"pick_lng\" class=\"form-control\">\n                <span class=\"material-input\"></span></div>\n              <label style=\"color:red;\" *ngIf=\"scheduleEditForm.controls.pickup.invalid && scheduleEditForm.controls.pickup.touched\">\n                {{ scheduleEditForm.controls.pickup.error_message }}</label>\n            </div>\n\n          </div>\n          <div class=\"row\">\n            <div class=\"col-md-12\">\n              <div class=\"form-group is-empty\">\n                <label class=\"control-label\">{{ this.helper.Lang().drop_address}}</label>\n                <input type=\"text\" id=\"DropOffAddress\"  placeholder=\"\" formControlName=\"drop\"  #drop class=\"form-control\" readonly >\n               <!-- <input type=\"hidden\" id=\"DropOffAddress\"  placeholder=\"\" formControlName=\"drop\"  #drop class=\"form-control\" >-->\n                <input type=\"hidden\" id=\"dropLat\" #droplat placeholder=\"\" formControlName=\"drop_lat\"  class=\"form-control\">\n                <input type=\"hidden\" id=\"dropLng\" #droplng placeholder=\"\" formControlName=\"drop_lng\"  class=\"form-control\">\n                <span class=\"material-input\"></span></div>\n              <label style=\"color:red;\" *ngIf=\"scheduleEditForm.controls.drop.invalid && scheduleEditForm.controls.drop.touched\">\n                {{ scheduleEditForm.controls.drop.error_message }}</label>\n            </div>\n          </div>\n          <div class=\"row\">\n            <div class=\"col-lg-12 col-md-12 col-sm-12\">\n              <!--(change)=\"updateType($event)\"-->\n              <select  style=\"display:block !important;\"  formControlName=\"type\" #type title=\"Choose Type\" id=\"type\" ><!--(focus)=\"hasFocus = true\"-->\n                <option [ngValue]=\"\" disabled [selected]=\"true\">{{ this.helper.Lang().select+' '+this.helper.Lang().type }}</option>\n\n                <!--     <ng-container *ngIf=\"hasFocus\">-->\n                <!--         <option *ngFor=\" let type of zoneTypes; \" [ngValue]=\"type.driver_type_id\">{{type.driver_type_name}}</option>-->\n                <!-- </ng-container>-->\n              </select>\n              <label style=\"color:red;\" *ngIf=\"scheduleEditForm.controls.type.invalid && scheduleEditForm.controls.type.touched\">\n                {{ scheduleEditForm.controls.type.error_message }}</label>\n            </div>\n          </div>\n          <div class=\"row\">\n            <div class=\"col-md-6\" >\n              <button type=\"submit\" class=\"btn btn-primary center-block\" [disabled]=\"!scheduleEditForm.valid\" (click)=\"save()\" >{{ this.helper.Lang().save }}</button></div>\n            <div class=\"col-md-6\">\n              <button type=\"submit\"  class=\"btn btn-primary center-block\"  (click)=\"close()\">{{ this.helper.Lang().close }}</button></div>\n\n\n\n            <div class=\"clearfix\"></div>\n          </div>\n        </form>\n      </div>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/schedule-edit/schedule-edit.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export getTimepickerConfig */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ScheduleEditComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__Core_Http_http__ = __webpack_require__("../../../../../src/app/Core/Http/http.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__Core_BaseComponent__ = __webpack_require__("../../../../../src/app/Core/BaseComponent.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5_ngx_bootstrap_timepicker__ = __webpack_require__("../../../../ngx-bootstrap/timepicker/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__Core_MapHandler_GoogleMap__ = __webpack_require__("../../../../../src/app/Core/MapHandler/GoogleMap.ts");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};







function getTimepickerConfig() {
    return Object.assign(new __WEBPACK_IMPORTED_MODULE_5_ngx_bootstrap_timepicker__["a" /* TimepickerConfig */](), {
        arrowkeys: false,
        hourStep: 1,
        minuteStep: 5,
        readonlyInput: false,
        mousewheel: true,
        showMinutes: true,
        showSeconds: false,
        showMeridian: true,
        showSpinners: false,
    });
}
var ScheduleEditComponent = /** @class */ (function (_super) {
    __extends(ScheduleEditComponent, _super);
    function ScheduleEditComponent(activate_route, router, http, fb) {
        var _this = _super.call(this) || this;
        _this.activate_route = activate_route;
        _this.router = router;
        _this.http = http;
        _this.fb = fb;
        _this.minDate = new Date();
        return _this;
    }
    ScheduleEditComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.MapHandler = __WEBPACK_IMPORTED_MODULE_6__Core_MapHandler_GoogleMap__["a" /* GoogleMap */].getHandler(google);
        this.MapHandler.setAutcomplete(this.pickup, { instance: this, callback: this.pickCallback });
        this.MapHandler.setAutcomplete(this.drop, { instance: this, callback: this.dropCallback });
        //to observe capute data from route.. use subscripe to retrive that
        this.sub = this.activate_route.params.subscribe(function (params) {
            _this.id = params['id'];
            var param = _this.get_param(_this.helper.system_settings.id, _this.helper.system_settings.token, _this.id);
            _this.http.postData(_this.helper.getConst().schedule_edit, param, { object: _this, complete: _this.set_data });
        }, function (error) { return console.log(error); }, function () { return console.log("schedule edit works"); });
        this.createForm();
    };
    ScheduleEditComponent.prototype.save = function () {
        var start_date_object = new Date(this.scheduleEditForm.value.trip_start_date);
        var start_time_object = new Date(this.scheduleEditForm.value.trip_start_time);
        /*start date formatter*/
        var start_date_format = this.date_formatter(start_date_object);
        /*start time formatter*/
        var start_time_spliter = start_time_object.toLocaleTimeString();
        var start_time_format = this.time_formatter(start_time_spliter);
        /*start date and time merge*/
        var start_date_time_format = start_date_format + " " + start_time_format;
        /*system time get time(Not less than 30 minutes)*/
        var system_date = new Date();
        var system_time = system_date.setMinutes(system_date.getMinutes() + 30);
        /*manual(start date time) get time */
        var manual_date = new Date(start_date_time_format);
        var manual_time = manual_date.getTime();
        if (system_time > manual_time) {
            alert("Please Enter Valid Date and Time");
        }
        else {
            console.log(this.scheduleEditForm.value);
            var param = this.get_edit_schedule_param(start_date_time_format, this.scheduleEditForm.value, this.helper);
            this.http.postData(this.helper.getConst().schedule_save, param, { object: this, complete: this.save_status });
        }
    };
    ScheduleEditComponent.prototype.time_formatter = function (time) {
        var elem = time.split(' ');
        var stSplit = elem[0].split(":");
        var stHour = stSplit[0];
        var stMin = stSplit[1];
        var stAmPm = elem[1];
        if (stAmPm == 'PM') {
            if (stHour != 12) {
                stHour = stHour * 1 + 12;
            }
        }
        else if (stAmPm == 'AM' && stHour == '12') {
            stHour = stHour - 12;
        }
        else {
            stHour = stHour;
        }
        return stHour + ':' + stMin + ':00';
    };
    ScheduleEditComponent.prototype.date_formatter = function (date) {
        var year = date.getFullYear() + "";
        var month = (date.getMonth() + 1) <= 9 ? "0" + (date.getMonth() + 1) : (date.getMonth() + 1) + "";
        var day = (date.getDate()) < 9 ? "0" + date.getDate() : date.getDate() + "";
        return year + "-" + month + "-" + day;
    };
    ScheduleEditComponent.prototype.save_status = function (object, response) {
        if (response.success) {
            object.helper.showNotification({ from: "top", align: "center", type: "success", message: response.success_message });
            object.router.navigate(['home/schedule']);
        }
        else {
            console.log(object);
            console.log(response);
        }
    };
    ScheduleEditComponent.prototype.close = function () {
        this.router.navigate(['home/schedule']);
    };
    ScheduleEditComponent.prototype.pickCallback = function (object, place) {
        var place = place.getPlace();
        if (place.geometry.viewport) {
            object.pickuplat.nativeElement.value = place.geometry.location.lat();
            object.pickuplng.nativeElement.value = place.geometry.location.lng();
            object.scheduleEditForm.get('pick_lat').setValue(place.geometry.location.lat());
            object.scheduleEditForm.get('pick_lng').setValue(place.geometry.location.lng());
            //native hold the reference of element
            object.scheduleEditForm.get('pickup').setValue(object.pickup.nativeElement.value);
        }
    };
    ScheduleEditComponent.prototype.dropCallback = function (object, place) {
        var place = place.getPlace();
        if (place.geometry.viewport) {
            object.droplat.nativeElement.value = place.geometry.location.lat();
            object.droplng.nativeElement.value = place.geometry.location.lng();
            object.scheduleEditForm.get('drop_lat').setValue(place.geometry.location.lat());
            object.scheduleEditForm.get('drop_lng').setValue(place.geometry.location.lng());
            object.scheduleEditForm.get('drop').setValue(object.drop.nativeElement.value);
        }
    };
    ScheduleEditComponent.prototype.set_data = function (schedule_object, schedule_response) {
        console.log(schedule_object);
        console.log(schedule_response);
        if (schedule_response.success) {
            var pno = (schedule_response.request.user_phone_number).replace(/[^a-zA-Z ]/, "");
            var trip_date_time = new Date(schedule_response.request.trip_start_time);
            schedule_object.scheduleEditForm.get('phone_number').setValue(pno);
            //schedule_object.scheduleEditForm.get('trip_start_date').setValue(schedule_response.request.trip_start_time);
            schedule_object.scheduleEditForm.get('trip_start_date').setValue(trip_date_time);
            schedule_object.scheduleEditForm.get('trip_start_time').setValue(trip_date_time);
            schedule_object.scheduleEditForm.get('first_name').setValue(schedule_response.request.user_first_name);
            schedule_object.scheduleEditForm.get('last_name').setValue(schedule_response.request.user_last_name);
            schedule_object.scheduleEditForm.get('pickup').setValue(schedule_response.request.pick_location);
            schedule_object.scheduleEditForm.get('pickup').setValue(schedule_response.request.pick_location);
            schedule_object.scheduleEditForm.get('pick_lat').setValue(schedule_response.request.pick_latitude);
            schedule_object.scheduleEditForm.get('pick_lng').setValue(schedule_response.request.pick_longitude);
            schedule_object.scheduleEditForm.get('drop').setValue(schedule_response.request.drop_location);
            schedule_object.scheduleEditForm.get('drop_lat').setValue(schedule_response.request.drop_latitude);
            schedule_object.scheduleEditForm.get('drop_lng').setValue(schedule_response.request.drop_longitude);
            schedule_object.scheduleEditForm.get('request_id').setValue(schedule_response.request.id);
            schedule_object.scheduleEditForm.get('timezone').setValue(schedule_response.request.timezone);
            schedule_object.vehicle_type_set(schedule_object, schedule_response);
        }
    };
    ScheduleEditComponent.prototype.vehicle_type_set = function (object, data) {
        if (data.success == true) {
            var car_type = data.driver_types_available_on_zone;
            var element = document.getElementById('type');
            element.innerHTML = "<option value=''>" + object.helper.Lang().select + " " + object.helper.Lang().type + "</option>";
            for (var i = 0; i < car_type.length; i++) {
                var opt = document.createElement("OPTION");
                opt.setAttribute("value", car_type[i].driver_type_id);
                if (data.request.current_type == car_type[i].driver_type_id) {
                    opt.setAttribute("selected", "selected");
                    object.scheduleEditForm.get('type').setValue(car_type[i].driver_type_id);
                }
                var t = document.createTextNode(car_type[i].driver_type_name);
                opt.appendChild(t);
                element.appendChild(opt);
            }
        }
        else {
            var element = document.getElementById('type');
            element.innerHTML = "<option value='' selected>" + object.helper.Lang().select + " " + object.helper.Lang().type + "</option>";
            //   alert(object.helper.Lang().no_service);
            object.helper.http_error_handler(null, null, 7);
            object.scheduleEditForm.get("type").setValue("");
        }
    };
    ScheduleEditComponent.prototype.createForm = function () {
        this.scheduleEditForm = this.fb.group({
            phone_number: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required, __WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].pattern('^[0-9]*$')]],
            first_name: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required, __WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].pattern('^[a-zA-Z]*$')]],
            last_name: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required, __WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].pattern('^[a-zA-Z]*$')]],
            type: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required]],
            drop: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required]],
            pickup: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required]],
            pick_lat: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required]],
            pick_lng: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required]],
            drop_lat: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required]],
            drop_lng: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required]],
            trip_start_date: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required]],
            trip_start_time: ['', [__WEBPACK_IMPORTED_MODULE_4__angular_forms__["f" /* Validators */].required]],
            request_id: [''],
            timezone: [''],
        });
        //  this.scheduleEditForm.controls['last_name'].markAsPristine();
        this.helper.setValidatorMessage(this.scheduleEditForm, [
            {
                formName: "first_name",
                message: {
                    "required": this.helper.Lang().first_name_required,
                    "pattern": this.helper.Lang().albhabet_only,
                }
            },
            {
                formName: "last_name",
                message: {
                    "required": this.helper.Lang().last_name_required,
                    "pattern": this.helper.Lang().albhabet_only,
                }
            },
            {
                formName: "phone_number",
                message: {
                    "required": this.helper.Lang().phone_number_required,
                    "pattern": this.helper.Lang().phone_must_number,
                }
            },
            {
                formName: "pickup",
                message: {
                    "required": this.helper.Lang().pick_address_required,
                }
            },
            {
                formName: "drop",
                message: {
                    "required": this.helper.Lang().drop_address_required,
                }
            },
            {
                formName: "type",
                message: {
                    "required": this.helper.Lang().type_required,
                }
            },
            {
                formName: "trip_start_date",
                message: {
                    "required": this.helper.Lang().start_date_required,
                }
            }, {
                formName: "trip_start_time",
                message: {
                    "required": this.helper.Lang().start_date_required,
                }
            }
        ]);
    };
    ScheduleEditComponent.prototype.getUser = function () {
        if (this.scheduleEditForm.value.phone_number == '' || this.scheduleEditForm.value.phone_number == null || this.scheduleEditForm.value.phone_number == undefined) {
        }
        else {
            var pno = (this.scheduleEditForm.value.phone_number).replace(/[^0-9 ]/, "");
            this.phone_number = "+" + pno;
            this.id = this.helper.system_settings.id;
            this.token = this.helper.system_settings.token;
            this.param = this.get_user_param(this.id, this.token, this.phone_number);
            this.http.postData(this.helper.getConst().userdetail, this.param, { object: this, complete: this.setUser });
        }
    };
    ScheduleEditComponent.prototype.setUser = function (object, response) {
        //   console.log(response);
        if (response.success) {
            object.scheduleEditForm.get('first_name').setValue(response.user.first_name);
            object.scheduleEditForm.get('last_name').setValue(response.user.last_name);
        }
        else {
            object.scheduleEditForm.get('first_name').setValue("");
            object.scheduleEditForm.get('last_name').setValue("");
        }
    };
    ScheduleEditComponent.prototype.get_param = function (id, token, request_id) {
        return {
            id: id,
            token: token,
            request_id: request_id
        };
    };
    ScheduleEditComponent.prototype.get_user_param = function (id, token, phone_number) {
        return {
            id: id,
            token: token,
            phone_number: phone_number
        };
    };
    ScheduleEditComponent.prototype.get_edit_schedule_param = function (trip_date_time, form_data, helper) {
        return {
            id: helper.system_settings.id,
            token: helper.system_settings.token,
            request_id: form_data.request_id,
            trip_start_time: trip_date_time,
            pick_latitude: form_data.pick_lat,
            pick_longitude: form_data.pick_lng,
            drop_latitude: form_data.drop_lat,
            drop_longitude: form_data.drop_lng,
            pick_location: form_data.pickup,
            drop_location: form_data.drop,
            type: form_data.type,
            user_phone_number: "+" + form_data.phone_number,
            is_cancelled: 0,
            user_first_name: form_data.first_name,
            user_last_name: form_data.last_name,
            timezone: helper.getConst().timezone,
        };
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('phone'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "phone", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('pickup'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "pickup", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('drop'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "drop", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('pickuplat'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "pickuplat", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('pickuplng'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "pickuplng", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('droplat'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "droplat", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('droplng'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "droplng", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('type'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "type", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('start_date'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "start_date", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('start_time'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "start_time", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('request_id'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "request_id", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('timezone'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleEditComponent.prototype, "timezone", void 0);
    ScheduleEditComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-schedule-edit',
            template: __webpack_require__("../../../../../src/app/schedule-edit/schedule-edit.component.html"),
            styles: [__webpack_require__("../../../../../src/app/schedule-edit/schedule-edit.component.css")],
            providers: [{ provide: __WEBPACK_IMPORTED_MODULE_5_ngx_bootstrap_timepicker__["a" /* TimepickerConfig */], useFactory: getTimepickerConfig }]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_router__["a" /* ActivatedRoute */], __WEBPACK_IMPORTED_MODULE_1__angular_router__["b" /* Router */], __WEBPACK_IMPORTED_MODULE_2__Core_Http_http__["a" /* Http */], __WEBPACK_IMPORTED_MODULE_4__angular_forms__["a" /* FormBuilder */]])
    ], ScheduleEditComponent);
    return ScheduleEditComponent;
}(__WEBPACK_IMPORTED_MODULE_3__Core_BaseComponent__["a" /* BaseComponent */]));



/***/ }),

/***/ "../../../../../src/app/schedule/schedule.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/schedule/schedule.component.html":
/***/ (function(module, exports) {

module.exports = "\n<div class=\"booking_page\">\n  <div class=\"box box-danger booking_page_body\">\n    <div class=\"box-header\" >\n      <h3 class=\"box-title\">Filter</h3>\n    </div>\n    <div class=\"box-body\">\n      <div class=\"row\">\n\n        <div class=\"col-md-6 col-sm-6 col-lg-6\">\n\n          <input\n                  class=\"form-control\"\n                  bsDatepicker\n                  [bsConfig]=\"{ dateInputFormat: 'YYYY-MM-DD' }\"\n                  placeholder=\"Start Date\"\n                  #start_date\n\n          >\n\n          <!--#dp=\"bsDatepicker\"-->\n          <br>\n        </div>\n\n\n        <div class=\"col-md-6 col-sm-6 col-lg-6\">\n          <input\n                  class=\"form-control\"\n                  bsDatepicker\n                  [bsConfig]=\"{ dateInputFormat: 'YYYY-MM-DD' }\"\n                  placeholder=\"End Date\"\n                  #end_date\n\n          >\n          <!--//#dp1=\"bsDatepicker\"-->\n          <br>\n        </div>\n\n        <div class=\"col-md-4 col-sm-4 col-lg-4\">\n\n          <select name=\"trip_status\" #trip_status  class=\"form-control\">\n\n            <option value=\"\" disabled>Trip Status</option>\n            <option value=\"1\">Trip not yet start</option>\n            <option value=\"2\">ongoing</option>\n            <option value=\"3\">Completed</option>\n            <option value=\"4\">Cancelled</option>\n          </select>\n          <br>\n        </div>\n\n    <!--    <div class=\"col-md-4 col-sm-4 col-lg-4\">\n\n          <select name=\"payment_status\" #payment_status class=\"form-control\">\n\n            <option value=\"\" disabled>Payment Status</option>\n            <option value=\"1\">Paid</option>\n            <option value=\"0\">Unpaid</option>\n          </select>\n          <br>\n        </div>\n\n        <div class=\"col-md-4 col-sm-4 col-lg-4\">\n\n          <select name=\"payment_type\" #payment_type class=\"form-control\">\n\n            <option value=\"\" disabled>Payment type</option>\n            <option value=\"1\">Cash</option>\n            <option value=\"0\">Card</option>\n          </select>\n          <br>\n        </div>\n-->\n\n        <div class=\"col-md-4 col-sm-4 col-lg-4\">\n          <input type=\"text\" class=\"form-control\" style=\"overflow:hidden;\" #driver_name  name=\"driver_name\" placeholder=\"Driver name\"  value=\"\">\n          <br>\n        </div>\n\n        <div class=\"col-md-4 col-sm-4 col-lg-4\">\n\n          <input type=\"text\" class=\"form-control\" style=\"overflow:hidden;\"  #user_name name=\"user_name\" placeholder=\"User name\"  value=\"\">\n\n          <br>\n        </div>\n\n\n      </div>\n    </div><!-- /.box-body -->\n    <div class=\"box-footer\">\n      <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" (click)=\"filter_data()\" >Filter Data</button>\n      <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" (click)=\"reset()\" >Reset</button>\n    </div>\n  </div>\n  {{ this.message}}\n\n  <div class=\"booking_page_table_total\" #data_table_view>\n\n    {{ this.select_page_style }} of {{ this.total_pages }}\n  </div>\n\n  <div #data_table class=\"box box-danger\">\n    <table class=\"table table-bordered\" id=\"request_list\">\n      <tr>\n        <th>Request id</th>\n        <th>User</th>\n        <th>Driver</th>\n        <th>Start time</th>\n        <th>Trip Status</th>\n        <th>Action</th>\n      </tr>\n\n      <tr *ngFor=\"let items  of this.display_data\">\n        <td>{{ items.request_id  }}</td>\n        <td>{{ (items.user_name !=  null)  ? items.user_name  : \"-\" }}</td>\n        <td>{{ (items.driver_name != null) ? items.driver_name : \"-\"   }}</td>\n        <td>{{ (items.trip_start_time != null )  ? items.trip_start_time : \"-\"  }}</td>\n        <td>{{ items.trip_status  }}</td>\n        <td><button (click)=\"edit_data(items.id)\">Edit</button></td>\n      </tr>\n    </table>\n\n  </div>\n\n\n\n\n\n\n\n\n\n  <div class=\"custom_pagination\" #pagination>\n\n    <li #prev (click)=\"prev_click()\" >&laquo;</li>\n\n    <li *ngFor=\"let arr of page_arr\" (click)=\"select_page($event)\" [value]=\"arr.page_no\"  class=\"{{ arr.page_no === this.select_page_style ? 'active':''}}\">\n      {{ arr.page_txt }}\n    </li>\n\n    <li #last (click)=\"last_click()\">&raquo;</li>\n\n  </div>\n\n\n</div>"

/***/ }),

/***/ "../../../../../src/app/schedule/schedule.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ScheduleComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__Core_BaseComponent__ = __webpack_require__("../../../../../src/app/Core/BaseComponent.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__Core_Http_http__ = __webpack_require__("../../../../../src/app/Core/Http/http.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_router__ = __webpack_require__("../../../router/esm5/router.js");
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var ScheduleComponent = /** @class */ (function (_super) {
    __extends(ScheduleComponent, _super);
    //display_data : any[];
    function ScheduleComponent(http, router) {
        var _this = _super.call(this) || this;
        _this.http = http;
        _this.router = router;
        _this.date = new Date();
        _this.setting_date = {
            bigBanner: false,
            timePicker: false,
            defaultOpen: false,
        };
        _this.message = "";
        _this.select_page_style = 1;
        _this.ride_later = 1;
        _this.page_arr = [];
        return _this;
    }
    ScheduleComponent.prototype.ngOnInit = function () {
        this.get_data(this.select_page_style, this.ride_later, this);
    };
    ScheduleComponent.prototype.filter_data = function () {
        /*
    
         console.log("start : ");
         console.log(this.start_date);
         console.log("end : ");
         console.log(this.end_date);
         console.log("trip_status : ");
         console.log(this.trip_status);
         console.log("payment_status : ");
         console.log(this.payment_status);
         console.log("driver_name : ");
         console.log(this.driver_name);
         console.log("username : ");
         console.log(this.user_name);
         console.log(" payment_mode : ");
         console.log(this.payment_type);
         */
        var param_start_date = this.start_date.nativeElement.value;
        var param_end_date = this.end_date.nativeElement.value;
        var get_data_start = true;
        if ((param_start_date != "") && (param_end_date == "")) {
            alert("End date required");
            get_data_start = false;
        }
        else if ((param_start_date == "") && (param_end_date != "")) {
            alert("Start date required");
            get_data_start = false;
        }
        else if ((param_start_date != "") && (param_end_date != "")) {
            var p_start_date = new Date(param_start_date + " 00:00:00");
            var p_end_date = new Date(param_end_date + " 23:59:59");
            if (p_start_date.getTime() > p_end_date.getTime()) {
                alert("Invalid Start date or End date");
                get_data_start = false;
            }
        }
        if (get_data_start) {
            this.select_page_style = 1;
            this.get_data(this.select_page_style, this.ride_later, this);
        }
    };
    ScheduleComponent.prototype.edit_data = function (request_id) {
        var id = request_id;
        this.router.navigate(['home/schedule_edit', id]);
    };
    ScheduleComponent.prototype.reset = function () {
        this.start_date.nativeElement.value = "";
        this.end_date.nativeElement.value = "";
        this.trip_status.nativeElement.value = "";
        this.driver_name.nativeElement.value = "";
        this.user_name.nativeElement.value = "";
        this.ngOnInit();
    };
    ScheduleComponent.prototype.get_data = function (select_page_no, ride_later_details, current_object) {
        var param = this.param_setting(select_page_no, ride_later_details, current_object);
        this.http.postData(this.helper.getConst().request_list, param, { object: this, complete: this.set_data });
    };
    ScheduleComponent.prototype.set_data = function (list_object, list_response) {
        if (list_response.success) {
            list_object.total_value = list_response.total_no_of_request;
            list_object.total_pages = (list_object.total_value / 10) > 0 ? Math.ceil(list_object.total_value / 10) : 1;
            list_object.display_data = list_response.request;
            list_object.pagination_settings(list_object.total_value, list_object.total_pages);
        }
        else {
            list_object.message = "No result found";
            list_object.pagination.nativeElement.style.display = "none";
            list_object.data_table.nativeElement.style.display = "none";
            list_object.data_table_view.nativeElement.style.display = "none";
        }
    };
    ScheduleComponent.prototype.select_page = function (event) {
        var click_page = event.target.value;
        this.select_page_style = click_page;
        this.prev.nativeElement.value = click_page;
        this.last.nativeElement.value = click_page;
        this.get_data(click_page, this.ride_later, this);
    };
    ScheduleComponent.prototype.prev_click = function () {
        var existing_page = this.prev.nativeElement.value;
        var move;
        if (existing_page != 1) {
            move = existing_page - 1;
            this.prev.nativeElement.value = move;
            this.last.nativeElement.value = move;
        }
        else {
            move = existing_page;
            this.prev.nativeElement.value = move;
            this.last.nativeElement.value = move;
        }
        this.select_page_style = move;
        this.get_data(move, this.ride_later, this);
        // this.page_arr = this.pagination_maker(move,this.total_pages);
    };
    ScheduleComponent.prototype.param_setting = function (select_page, ride_late_details, obj) {
        var param_trip_status = obj.trip_status.nativeElement.value;
        var param_driver_name = obj.driver_name.nativeElement.value;
        var param_user_name = obj.user_name.nativeElement.value;
        var param_start_date = obj.start_date.nativeElement.value;
        var param_end_date = obj.end_date.nativeElement.value;
        return {
            id: this.helper.system_settings.id,
            token: this.helper.system_settings.token,
            page: select_page,
            ride_later: ride_late_details,
            search_key_user: param_user_name,
            search_key_driver: param_driver_name,
            search_key_trip_status: param_trip_status,
            /* search_key_payment_type:param_payment_type,
             search_key_payment_status: param_payment_status,
            */ search_key_from_date: (param_start_date.length > 0) ? param_start_date + " 00:00:00" : "",
            search_key_to_date: (param_end_date.length > 0) ? param_end_date + " 23:59:59" : "",
        };
    };
    ScheduleComponent.prototype.last_click = function () {
        var existing_page = this.last.nativeElement.value;
        var move;
        if (existing_page != this.total_pages) {
            move = existing_page + 1;
            this.last.nativeElement.value = move;
            this.prev.nativeElement.value = move;
        }
        else {
            move = existing_page;
            this.last.nativeElement.value = move;
            this.prev.nativeElement.value = move;
        }
        this.select_page_style = move;
        this.get_data(move, this.ride_later, this);
        //  this.page_arr = this.pagination_maker(move,this.total_pages);
    };
    /*if tot_values greater than of 10 mean generate pagination else dont show*/
    ScheduleComponent.prototype.pagination_settings = function (tot_values, tot_pages) {
        var total_value = tot_values;
        //  alert(tot_pages);
        if (total_value >= 1) {
            var initial_click = this.select_page_style;
            this.page_arr = [];
            this.page_arr = this.pagination_maker(initial_click, tot_pages);
            this.prev.nativeElement.value = initial_click;
            this.last.nativeElement.value = initial_click;
            if (tot_values > 10) {
                this.pagination.nativeElement.style.display = "block";
            }
            else {
                this.pagination.nativeElement.style.display = "none";
            }
            this.data_table.nativeElement.style.display = "block";
            this.data_table_view.nativeElement.style.display = "block";
            this.message = "";
        }
        else {
            this.message = "No result found";
            this.pagination.nativeElement.style.display = "none";
            this.data_table.nativeElement.style.display = "none";
            this.data_table_view.nativeElement.style.display = "none";
        }
    };
    /*pagination maker just give starting page(click_page_number) and total_page */
    ScheduleComponent.prototype.pagination_maker = function (click_page_number, total_pages) {
        var num = 0;
        var count = 0;
        var page_view_data = [];
        var start_page = (click_page_number - 2) > 0 ? (click_page_number - 2) : 1;
        /*To Arrange array for page*/
        for (num = start_page; num < total_pages; num++) {
            if (count > 3) {
                count++;
            }
            else {
                var temp = void 0;
                var page_text = void 0;
                if (num == 1) {
                    page_text = "First";
                }
                else if (num == total_pages) {
                    page_text = "Last";
                }
                else {
                    page_text = num;
                }
                temp = {
                    "page_no": (num),
                    "page_txt": page_text,
                    "page_start": ((num * 10) - 9) < 0 ? 1 : ((num * 10) - 9),
                };
                page_view_data.push(temp);
                count++;
            }
        }
        /*To check first and last page.... if not there add both*/
        if (page_view_data.length > 0) {
            if (page_view_data[0].page_no != 1) {
                var first_elem = {
                    "page_no": 1,
                    "page_txt": "First",
                    "page_start": 1,
                };
                page_view_data.unshift(first_elem);
            }
            if (page_view_data[(page_view_data.length) - 1].page_no != total_pages) {
                var last_elem = {
                    "page_no": total_pages,
                    "page_txt": "Last",
                    "page_start": (total_pages * 10) - 9,
                };
                page_view_data.push(last_elem);
            }
        }
        return page_view_data;
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('last'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleComponent.prototype, "last", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('prev'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleComponent.prototype, "prev", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('pagination'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleComponent.prototype, "pagination", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('data_table'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleComponent.prototype, "data_table", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('data_table_view'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleComponent.prototype, "data_table_view", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('start_date'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleComponent.prototype, "start_date", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('end_date'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleComponent.prototype, "end_date", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('trip_status'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleComponent.prototype, "trip_status", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('driver_name'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleComponent.prototype, "driver_name", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('user_name'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["t" /* ElementRef */])
    ], ScheduleComponent.prototype, "user_name", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('datepick'),
        __metadata("design:type", Object)
    ], ScheduleComponent.prototype, "datepick", void 0);
    ScheduleComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-schedule',
            template: __webpack_require__("../../../../../src/app/schedule/schedule.component.html"),
            styles: [__webpack_require__("../../../../../src/app/schedule/schedule.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__Core_Http_http__["a" /* Http */], __WEBPACK_IMPORTED_MODULE_3__angular_router__["b" /* Router */]])
    ], ScheduleComponent);
    return ScheduleComponent;
}(__WEBPACK_IMPORTED_MODULE_1__Core_BaseComponent__["a" /* BaseComponent */]));



/***/ }),

/***/ "../../../../../src/app/triphandler/triphandler.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/triphandler/triphandler.component.html":
/***/ (function(module, exports) {

module.exports = "<!-- id=\"myModal\" -->   <!--style=\"display: block;\"-->\n<div class=\"modal\"  #auto_modal role=\"dialog\"  style=\"display: none;\" >\n  <div class=\"modal-dialog\">\n\n\n    <div class=\"modal-content\">\n      <div class=\"modal-header\">\n        <button type=\"button\" class=\"close\" style=\"display: none;\" data-dismiss=\"modal\">&times;</button>\n        <h4 class=\"modal-title\" class=\"trip_model_header\">{{ this.object.helper.Lang().ride+' '+this.object.helper.Lang().status }}</h4>\n      </div>\n      <div class=\"modal-body\">\n          <table class=\"trip_table\">\n              <tr>\n                  <td rowspan=\"2\"><img src=\"{{this.image_url}}\" class=\"trip_image\" style=\"/*width: 115px; height: 100px;*/\"></td>\n                  <td class=\"font_driver_name\"> {{ this.driver_name }}</td>\n              </tr>\n              <tr>\n                  <td class=\"message\">\n                      {{ this.message_show }}\n                  <button (click)=\"cancel_trip()\" class=\"btn btn-danger\" #cancel_button>{{ this.object.helper.Lang().cancel }}</button>\n                  </td>\n              </tr>\n          </table>\n      </div>\n\n        <div class=\"modal-footer\">\n        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\"  (click)=\"close_auto()\" >{{ this.object.helper.Lang().close }}</button>\n      </div>\n    </div>\n\n  </div>\n</div>\n\n\n\n<div class=\"modal\"  #manual_modal role=\"dialog\"   >\n    <div class=\"modal-dialog\">\n\n\n        <div class=\"modal-content\">\n            <div class=\"modal-header\">\n                <button type=\"button\" class=\"close\" style=\"display: none;\" data-dismiss=\"modal\">&times;</button>\n                <h4 class=\"modal-title\" class=\"trip_model_header\">{{ this.object.helper.Lang().ride+' '+this.object.helper.Lang().select+' '+this.object.helper.Lang().driver }}</h4>\n            </div>\n            <div class=\"modal-body\">\n\n                <div class=\"row\">\n                    <!--<div class=\"col-lg-4 col-md-6 col-sm-12\">\n\n                        <select   style=\"display:block !important;\"  #driver_choose title=\"Choose Driver\" id=\"driver_id\" >&lt;!&ndash;(focus)=\"hasFocus = true\"&ndash;&gt;\n                            <option [value]=\"0\">{{ this.object.helper.Lang().select+' '+this.object.helper.Lang().driver }}</option>\n                            <option *ngFor=\" let driver of driver_list; \" [value]=\"driver.id\">{{driver.driver_name}}</option>\n                        </select>\n                        {{ this.manual_message_show }}\n                    </div>-->\n\n\n                    <table class=\"trip_table\">\n                        <tr>\n                           <td>\n                            <select   style=\"display:block !important;\"  #driver_choose title=\"Choose Driver\" id=\"driver_id\" >&lt;!&ndash;(focus)=\"hasFocus = true\"&ndash;&gt;\n                                <option [value]=\"0\">{{ this.object.helper.Lang().select+' '+this.object.helper.Lang().driver }}</option>\n                                <option *ngFor=\" let driver of driver_list; \" [value]=\"driver.id\">{{driver.driver_name}}</option>\n                            </select>\n                           </td>\n\n\n                        </tr>\n                        <tr>\n\n                            <td class=\"message\">\n                                {{ this.manual_message_show }}\n\n                            </td>\n                        </tr>\n\n                        <tr>\n                            <td>\n                                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\"  (click)=\"manual_select_driver()\" >{{ this.object.helper.Lang().submit }}</button>\n                                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\"  (click)=\"manual_cancel()\" >{{ this.object.helper.Lang().cancel }}</button>\n                                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\"  (click)=\"close_manual()\" >{{ this.object.helper.Lang().close }}</button>\n                            </td>\n                        </tr>\n\n                    </table>\n\n                </div>\n\n\n            </div>\n            <div class=\"modal-footer\">\n\n\n            </div>\n        </div>\n\n    </div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/triphandler/triphandler.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return TriphandlerComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var TriphandlerComponent = /** @class */ (function () {
    function TriphandlerComponent() {
    }
    TriphandlerComponent.prototype.auto_trip_timer = function () {
        var _this = this;
        this.param = this.param_function(this.object, this.data);
        this.timer = setInterval(function () {
            //  console.log(this.param);
            _this.object.http.postData(_this.object.helper.getConst().request_status, _this.param, { object: _this, complete: _this.auto_trip_handler });
        }, 5000);
    };
    TriphandlerComponent.prototype.cancel_trip = function () {
        console.log("i m cancel");
        console.log(this.object);
        console.log(this.data);
        var cancel_reason = "Dispatch Admin cancel";
        this.param_cancel = this.param_cancel_function(this.object, this.data, cancel_reason);
        /*
            console.log("after");
            console.log(this.object);
            console.log(this.data);*/
        this.object.http.postData(this.object.helper.getConst().cancelrequest, this.param_cancel, { object: this, complete: this.cancel_trip_handler });
    };
    TriphandlerComponent.prototype.cancel_trip_handler = function (object, response) {
        if (response.success) {
        }
        else {
            console.log(object);
        }
    };
    TriphandlerComponent.prototype.auto_trip_handler = function (trip_object, trip_response) {
        console.log("trip_obj");
        console.log(trip_object);
        console.log(trip_response);
        trip_object.driver_name = trip_response.driver.driver_name;
        trip_object.image_url = trip_response.driver.profile_pic;
        var array_timer = [];
        if (trip_response.request.is_cancelled == 1) {
            trip_object.message_show = trip_object.object.helper.Lang().trip + " " + trip_object.object.helper.Lang().cancelled;
            array_timer.push(trip_object.timer);
            trip_object.object.helper.stop_timer(array_timer);
        }
        else if (trip_response.request.is_completed == 1) {
            trip_object.message_show = trip_object.object.helper.Lang().trip + " " + trip_object.object.helper.Lang().completed;
            array_timer.push(trip_object.timer);
            trip_object.object.helper.stop_timer(array_timer);
        }
        else if (trip_response.request.is_trip_start == 1) {
            trip_object.message_show = trip_object.object.helper.Lang().trip + " " + trip_object.object.helper.Lang().going;
        }
        else {
            trip_object.message_show = "";
        }
        if (trip_response.request.is_cancelled == 1 || trip_response.request.is_trip_start == 1 || trip_response.request.is_completed == 1) {
            trip_object.cancel_button.nativeElement.style.display = "none";
        }
        else {
            trip_object.cancel_button.nativeElement.style.display = "block";
        }
        trip_object.auto_modal.nativeElement.style.display = "block";
    };
    TriphandlerComponent.prototype.manual_driver_set = function () {
        //   alert("manual set");
        this.manual_modal.nativeElement.style.display = "block";
    };
    TriphandlerComponent.prototype.manual_select_driver = function () {
        var select_driver_id = this.driver_choose.nativeElement.value;
        var param;
        if (select_driver_id > 0) {
            if (this.data.hasOwnProperty('request_details')) {
                param = this.data.request_details;
                param["driver_id"] = select_driver_id;
                this.object.http.postData(this.object.helper.getConst().manualcreaterequest, param, { object: this, complete: this.manual_trip_handler });
                // manual_trip_handler
            }
            else {
                console.log("no request details found");
            }
            this.manual_message_show = "";
        }
        else {
            this.manual_message_show = this.object.helper.Lang().invalid + " " + this.object.helper.Lang().driver;
        }
    };
    TriphandlerComponent.prototype.manual_trip_handler = function (trip_manual_object, trip_manual_response) {
        console.log("trip_manual_object");
        console.log(trip_manual_object);
        console.log("trip_manual_response");
        console.log(trip_manual_response);
        if (trip_manual_response.success) {
            /*trip_manual_object.http_error_handler().showNotification()*/
            trip_manual_object.object.helper.showNotification({ from: "top", align: "center", type: "success", message: trip_manual_response.success_message });
            trip_manual_object.object["triphandleview"].onDestroy(function () {
                trip_manual_object.object.ngOnInit();
            });
            trip_manual_object.object.ViewDestory(trip_manual_object.object, "triphandleview");
            trip_manual_object.object.ViewDestory(trip_manual_object.object, "etaview");
        }
    };
    TriphandlerComponent.prototype.manual_cancel = function () {
        this.manual_modal.nativeElement.style.display = "none";
    };
    TriphandlerComponent.prototype.ngOnInit = function () {
        //  this.object.driver_get_timer.setTimeout();
        console.log("data");
        console.log(this.data);
        console.log("object");
        console.log(this.object);
        var array_timer = [];
        array_timer.push(this.object.driver_get_timer);
        this.object.helper.stop_timer(array_timer);
        if (this.data) {
            if (this.data.is_automatic == 1) {
                this.auto_trip_timer();
            }
            else {
                this.driver_list = this.data.driver;
                console.log("driver_list");
                console.log(this.driver_list);
                this.manual_driver_set();
            }
        }
        else {
            //    console.log("falise");
        }
    };
    TriphandlerComponent.prototype.close_auto = function () {
        var _this = this;
        this.object["triphandleview"].onDestroy(function () {
            _this.object.ngOnInit();
        });
        this.object.ViewDestory(this.object, "triphandleview");
        this.object.ViewDestory(this.object, "etaview");
        //  this.timer.setTimeout();
    };
    TriphandlerComponent.prototype.close_manual = function () {
        var _this = this;
        this.object["triphandleview"].onDestroy(function () {
            _this.object.ngOnInit();
        });
        this.object.ViewDestory(this.object, "triphandleview");
        this.object.ViewDestory(this.object, "etaview");
    };
    TriphandlerComponent.prototype.param_function = function (param_object, param_data) {
        return {
            id: param_object.helper.system_settings.id,
            token: param_object.helper.system_settings.token,
            request_id: param_data.request.id,
        };
    };
    TriphandlerComponent.prototype.param_cancel_function = function (param_object, param_data, can_reason) {
        return {
            id: param_object.helper.system_settings.id,
            token: param_object.helper.system_settings.token,
            request_id: param_data.request.id,
            reason: can_reason,
        };
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["D" /* Input */])(),
        __metadata("design:type", Object)
    ], TriphandlerComponent.prototype, "data", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["D" /* Input */])(),
        __metadata("design:type", Object)
    ], TriphandlerComponent.prototype, "object", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('cancel_button'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["_11" /* ViewContainerRef */])
    ], TriphandlerComponent.prototype, "cancel_button", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('auto_trip_view'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["_11" /* ViewContainerRef */])
    ], TriphandlerComponent.prototype, "auto_trip_view", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('manual_trip_view'),
        __metadata("design:type", __WEBPACK_IMPORTED_MODULE_0__angular_core__["_11" /* ViewContainerRef */])
    ], TriphandlerComponent.prototype, "manual_trip_view", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('auto_modal'),
        __metadata("design:type", Object)
    ], TriphandlerComponent.prototype, "auto_modal", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('manual_modal'),
        __metadata("design:type", Object)
    ], TriphandlerComponent.prototype, "manual_modal", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('driver_choose'),
        __metadata("design:type", Object)
    ], TriphandlerComponent.prototype, "driver_choose", void 0);
    TriphandlerComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-triphandler',
            template: __webpack_require__("../../../../../src/app/triphandler/triphandler.component.html"),
            styles: [__webpack_require__("../../../../../src/app/triphandler/triphandler.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], TriphandlerComponent);
    return TriphandlerComponent;
}());



/***/ }),

/***/ "../../../../../src/app/triplater/triplater.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".winkel-calendar[_ngcontent-c7]{\n    width: 130%;\n\n}", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/triplater/triplater.component.html":
/***/ (function(module, exports) {

module.exports = "\n\n<div class=\"modal\"  role=\"dialog\"  style=\"display: block\"  >\n  <div class=\"modal-dialog\">\n\n\n    <div class=\"modal-content\">\n      <div class=\"modal-header\">\n        <button type=\"button\" class=\"close\" style=\"display: none;\" data-dismiss=\"modal\">&times;</button>\n        <h4 class=\"modal-title\" style=\"border-bottom: 2px solid black;padding-bottom: 9px;\">{{ this.data.helper.Lang().date+' '+this.data.helper.Lang().and+' '+this.data.helper.Lang().time }}</h4>\n      </div>\n      <div class=\"modal-body\" style=\"margin-left:10% \">\n\n        <div class=\"row\">\n\n          <div class=\"col-lg-8 col-md-12 col-sm-12\">\n\n            <div style=\"width: 133%;\">\n              <angular2-date-picker [(ngModel)]=\"date\" #datepick [settings]=\"setting_date\"></angular2-date-picker>\n                  <p style=\"color: red;\"> {{ this.invalid_time }}</p>\n                </div>\n         </div>\n          <!--<div class=\"col-lg-12 col-md-12 col-sm-12\" style=\"text-align: center;margin-top: 4%;\">\n            <button (click)=\"set_ride_later()\" class=\"btn btn-primary center-block\">{{ this.data.helper.Lang().submit }}</button>\n            <button (click)=\"close()\" class=\"btn btn-primary center-block\">{{ this.data.helper.Lang().close }}</button>\n          </div>-->\n        </div>\n        <div class=\"row\" style=\"margin-left: 10%;margin-top: 2%;\">\n          <div class=\"col-lg-4 col-md-12 col-sm-12\"  >\n            <button (click)=\"set_ride_later()\" class=\"btn btn-primary center-block\">{{ this.data.helper.Lang().submit }}</button>\n          </div>\n          <div class=\"col-lg-4 col-md-12 col-sm-12\">\n            <button (click)=\"close()\" class=\"btn btn-primary center-block\">{{ this.data.helper.Lang().close }}</button>\n          </div>\n\n      </div>\n\n    </div>\n\n  </div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/triplater/triplater.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return TriplaterComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var TriplaterComponent = /** @class */ (function () {
    function TriplaterComponent() {
        this.date = new Date();
        this.setting_date = {
            bigBanner: true,
            timePicker: true,
            defaultOpen: false,
        };
    }
    TriplaterComponent.prototype.set_ride_later = function () {
        var select_time = this.datepick.date;
        var system_date = new Date();
        var system_time = system_date.setMinutes(system_date.getMinutes() + 30);
        if (system_time < select_time.getTime()) {
            this.param = this.ridelater_param(this.data, select_time);
            this.data.http.postData(this.data.helper.getConst().request_later, this.param, { object: this.data, complete: this.ride_later_result });
        }
        else {
            //invalid_time
            this.invalid_time = this.data.helper.Lang().invalid_time;
            console.log("invalid");
        }
    };
    TriplaterComponent.prototype.close = function () {
        this.data.ViewDestory(this.data, "triplaterview");
    };
    TriplaterComponent.prototype.ride_later_result = function (object, response) {
        if (response.success) {
            object.helper.showNotification({ from: "top", align: "center", type: "success", message: response.success_message });
            object.ViewDestory(object, "etaview");
            object.ViewDestory(object, "triplaterview");
            object.ngOnInit();
        }
        else {
            console.log(object);
            console.log(response);
        }
    };
    TriplaterComponent.prototype.ngOnInit = function () {
    };
    TriplaterComponent.prototype.ridelater_param = function (data, select_time) {
        var phone_number = (data.tripRegisterForm.value.country_code + "" + data.tripRegisterForm.value.phone_number).replace(/ /g, "");
        var set_time = this.GetFormattedDate(select_time);
        return {
            id: this.data.helper.system_settings.id,
            token: this.data.helper.system_settings.token,
            platitude: data.tripRegisterForm.value.pick_lat,
            plongitude: data.tripRegisterForm.value.pick_lng,
            dlatitude: data.tripRegisterForm.value.drop_lat,
            dlongitude: data.tripRegisterForm.value.drop_lng,
            payment_opt: 1,
            type: data.tripRegisterForm.value.type,
            user_id: data.tripRegisterForm.value.user_id,
            drop_location: data.tripRegisterForm.value.drop,
            pick_location: data.tripRegisterForm.value.pickup,
            firstname: data.tripRegisterForm.value.first_name,
            lastname: data.tripRegisterForm.value.last_name,
            phone_number: phone_number,
            timezone: data.helper.getConst().timezone,
            datetime: set_time,
        };
    };
    TriplaterComponent.prototype.GetFormattedDate = function (dat) {
        var today = new Date(dat);
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        var hour = today.getHours();
        var minute = today.getMinutes();
        var dat_format = yyyy + '-' + mm + '-' + dd + ' ' + hour + ':' + minute + ':' + '00';
        return dat_format;
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["D" /* Input */])(),
        __metadata("design:type", Object)
    ], TriplaterComponent.prototype, "data", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_10" /* ViewChild */])('datepick'),
        __metadata("design:type", Object)
    ], TriplaterComponent.prototype, "datepick", void 0);
    TriplaterComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-triplater',
            template: __webpack_require__("../../../../../src/app/triplater/triplater.component.html"),
            styles: [__webpack_require__("../../../../../src/app/triplater/triplater.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], TriplaterComponent);
    return TriplaterComponent;
}());



/***/ }),

/***/ "../../../../../src/environments/environment.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return environment; });
// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `.angular-cli.json`.
var environment = {
    production: false
};


/***/ }),

/***/ "../../../../../src/main.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__ = __webpack_require__("../../../platform-browser-dynamic/esm5/platform-browser-dynamic.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__app_app_module__ = __webpack_require__("../../../../../src/app/app.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__environments_environment__ = __webpack_require__("../../../../../src/environments/environment.ts");




if (__WEBPACK_IMPORTED_MODULE_3__environments_environment__["a" /* environment */].production) {
    Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_15" /* enableProdMode */])();
}
Object(__WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__["a" /* platformBrowserDynamic */])().bootstrapModule(__WEBPACK_IMPORTED_MODULE_2__app_app_module__["a" /* AppModule */])
    .catch(function (err) { return console.log(err); });


/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("../../../../../src/main.ts");


/***/ })

},[0]);
//# sourceMappingURL=main.bundle.js.map