!function(e){var t={};function n(a){if(t[a])return t[a].exports;var r=t[a]={i:a,l:!1,exports:{}};return e[a].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,a){n.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:a})},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=3)}([function(e,t){e.exports=function(e){var t=[];return t.toString=function(){return this.map(function(t){var n=function(e,t){var n=e[1]||"",a=e[3];if(!a)return n;if(t&&"function"==typeof btoa){var r=(s=a,"/*# sourceMappingURL=data:application/json;charset=utf-8;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(s))))+" */"),i=a.sources.map(function(e){return"/*# sourceURL="+a.sourceRoot+e+" */"});return[n].concat(i).concat([r]).join("\n")}var s;return[n].join("\n")}(t,e);return t[2]?"@media "+t[2]+"{"+n+"}":n}).join("")},t.i=function(e,n){"string"==typeof e&&(e=[[null,e,""]]);for(var a={},r=0;r<this.length;r++){var i=this[r][0];"number"==typeof i&&(a[i]=!0)}for(r=0;r<e.length;r++){var s=e[r];"number"==typeof s[0]&&a[s[0]]||(n&&!s[2]?s[2]=n:n&&(s[2]="("+s[2]+") and ("+n+")"),t.push(s))}},t}},function(e,t,n){var a="undefined"!=typeof document;if("undefined"!=typeof DEBUG&&DEBUG&&!a)throw new Error("vue-style-loader cannot be used in a non-browser environment. Use { target: 'node' } in your Webpack config to indicate a server-rendering environment.");var r=n(8),i={},s=a&&(document.head||document.getElementsByTagName("head")[0]),o=null,l=0,c=!1,u=function(){},d=null,f="data-vue-ssr-id",p="undefined"!=typeof navigator&&/msie [6-9]\b/.test(navigator.userAgent.toLowerCase());function h(e){for(var t=0;t<e.length;t++){var n=e[t],a=i[n.id];if(a){a.refs++;for(var r=0;r<a.parts.length;r++)a.parts[r](n.parts[r]);for(;r<n.parts.length;r++)a.parts.push(g(n.parts[r]));a.parts.length>n.parts.length&&(a.parts.length=n.parts.length)}else{var s=[];for(r=0;r<n.parts.length;r++)s.push(g(n.parts[r]));i[n.id]={id:n.id,refs:1,parts:s}}}}function v(){var e=document.createElement("style");return e.type="text/css",s.appendChild(e),e}function g(e){var t,n,a=document.querySelector("style["+f+'~="'+e.id+'"]');if(a){if(c)return u;a.parentNode.removeChild(a)}if(p){var r=l++;a=o||(o=v()),t=_.bind(null,a,r,!1),n=_.bind(null,a,r,!0)}else a=v(),t=function(e,t){var n=t.css,a=t.media,r=t.sourceMap;a&&e.setAttribute("media",a);d.ssrId&&e.setAttribute(f,t.id);r&&(n+="\n/*# sourceURL="+r.sources[0]+" */",n+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(r))))+" */");if(e.styleSheet)e.styleSheet.cssText=n;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(n))}}.bind(null,a),n=function(){a.parentNode.removeChild(a)};return t(e),function(a){if(a){if(a.css===e.css&&a.media===e.media&&a.sourceMap===e.sourceMap)return;t(e=a)}else n()}}e.exports=function(e,t,n,a){c=n,d=a||{};var s=r(e,t);return h(s),function(t){for(var n=[],a=0;a<s.length;a++){var o=s[a];(l=i[o.id]).refs--,n.push(l)}t?h(s=r(e,t)):s=[];for(a=0;a<n.length;a++){var l;if(0===(l=n[a]).refs){for(var c=0;c<l.parts.length;c++)l.parts[c]();delete i[l.id]}}}};var m,b=(m=[],function(e,t){return m[e]=t,m.filter(Boolean).join("\n")});function _(e,t,n,a){var r=n?"":a.css;if(e.styleSheet)e.styleSheet.cssText=b(t,r);else{var i=document.createTextNode(r),s=e.childNodes;s[t]&&e.removeChild(s[t]),s.length?e.insertBefore(i,s[t]):e.appendChild(i)}}},function(e,t){e.exports=function(e,t,n,a,r,i){var s,o=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(s=e,o=e.default);var c,u="function"==typeof o?o.options:o;if(t&&(u.render=t.render,u.staticRenderFns=t.staticRenderFns,u._compiled=!0),n&&(u.functional=!0),r&&(u._scopeId=r),i?(c=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),a&&a.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(i)},u._ssrRegister=c):a&&(c=a),c){var d=u.functional,f=d?u.render:u.beforeCreate;d?(u._injectStyles=c,u.render=function(e,t){return c.call(t),f(e,t)}):u.beforeCreate=f?[].concat(f,c):[c]}return{esModule:s,exports:o,options:u}}},function(e,t,n){e.exports=n(4)},function(e,t,n){Nova?Nova.booting(function(e,t){e.component("alert-feed",n(5)),e.component("alert-panel",n(11)),e.component("alert-message",n(16))}):console.error("mynabird::error Could not find Nova!")},function(e,t,n){var a=n(2)(n(9),n(10),!1,function(e){n(6)},"data-v-83fce9ac",null);e.exports=a.exports},function(e,t,n){var a=n(7);"string"==typeof a&&(a=[[e.i,a,""]]),a.locals&&(e.exports=a.locals);n(1)("034908fa",a,!0,{})},function(e,t,n){(e.exports=n(0)(!1)).push([e.i,".alert-button[data-v-83fce9ac]{color:#fff;display:inline-block;position:relative}.badge[data-v-83fce9ac]{background-color:#fa3e3e;border-radius:2px;color:#fff;padding:1px 3px;font-size:10px;position:absolute;top:0;right:5px}",""])},function(e,t){e.exports=function(e,t){for(var n=[],a={},r=0;r<t.length;r++){var i=t[r],s=i[0],o={id:e+":"+r,css:i[1],media:i[2],sourceMap:i[3]};a[s]?a[s].parts.push(o):n.push(a[s]={id:s,parts:[o]})}return n}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=function(e){console.error("mynabird::error ",e)},r=function(e){console.log("mynabird::log ",e)};t.default={name:"MynabirdAlertFeed",props:["config"],data:function(){return{alerts:null,isPanelVisible:!1}},methods:{togglePanel:function(){this.isPanelVisible=!this.isPanelVisible},changePage:function(e,t){var n=this;Nova.request().get("/mynabird/alerts?page="+e).then(function(e){n.alerts=e.data,t&&t()})},markAlertRead:function(e){var t=this;e.read_at||Nova.request().post("/mynabird/alerts/read",{alert_ids:[e.id]}).then(function(e){t.alerts.unread--}).catch(function(e){e("There was a problem trying to mark the alert as read",e)})},reload:function(){this.changePage(this.alerts.current_page)},bindPusher:function(){var e=this;!function(e,t,n){console.log("bindings",e,t,n),n.should_broadcast&&window.pusher?(r("Pusher found. Adding event bindings."),e.map(function(e){r("... subscribing to "+e),window.pusher.subscribe(e).bind("new_alert",t)})):n.should_broadcast?a("Pusher not found. Skipping binding(s)."):r("Broadcasting disabled.")}(["broadcast","user."+this.alerts.user_id],function(t){var n,i,s;n=e,i=t.level,s=t.title,n.$toasted?(console.log("sending toast message",n,i,s),n.$toasted.show(s,{type:i})):(a("No toast message provider available."),r(i+" "+s)),e.reload()},e.config)}},mounted:function(){this.changePage(1,this.bindPusher)}}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,n=e._self._c||t;return null!=e.alerts?n("div",[n("div",{staticClass:"cursor-pointer notification-dropdown text-center alert-button",staticStyle:{width:"40px"},on:{click:e.togglePanel}},[n("svg",{attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",width:"24",height:"24"}},[n("path",{staticClass:"heroicon-ui",attrs:{d:"M15 19a3 3 0 0 1-6 0H4a1 1 0 0 1 0-2h1v-6a7 7 0 0 1 4.02-6.34 3 3 0 0 1 5.96 0A7 7 0 0 1 19 11v6h1a1 1 0 0 1 0 2h-5zm-4 0a1 1 0 0 0 2 0h-2zm0-12.9A5 5 0 0 0 7 11v6h10v-6a5 5 0 0 0-4-4.9V5a1 1 0 0 0-2 0v1.1z"}})]),e._v(" "),n("div",{directives:[{name:"show",rawName:"v-show",value:e.alerts&&e.alerts.unread>0,expression:"alerts && alerts.unread > 0"}],staticClass:"badge"},[e._v("\n            "+e._s(e.alerts.unread)+"\n        ")])]),e._v(" "),n("div",{directives:[{name:"show",rawName:"v-show",value:e.isPanelVisible,expression:"isPanelVisible"}]},[n("alert-panel",{attrs:{config:e.config,alerts:e.alerts},on:{alertRead:function(t){return e.markAlertRead(t)},changePage:function(t){return e.changePage(t)},togglePanel:e.togglePanel}})],1)]):e._e()},staticRenderFns:[]}},function(e,t,n){var a=n(2)(n(14),n(15),!1,function(e){n(12)},"data-v-5c9f44c8",null);e.exports=a.exports},function(e,t,n){var a=n(13);"string"==typeof a&&(a=[[e.i,a,""]]),a.locals&&(e.exports=a.locals);n(1)("5b1b2c72",a,!0,{})},function(e,t,n){(e.exports=n(0)(!1)).push([e.i,".alerts-panel[data-v-5c9f44c8]{z-index:999;position:fixed!important;right:0;top:0;width:340px;height:100%;background-color:#536170;padding-bottom:70px}#alerts-panel-close[data-v-5c9f44c8]{height:60px;line-height:60px;cursor:pointer}#alerts-panel-close[data-v-5c9f44c8]:hover{background-color:#252d37}.pagination[data-v-5c9f44c8]{width:100%}.pagination button[data-v-5c9f44c8]{color:#fff;padding:1.5rem}.pagination .prev[data-v-5c9f44c8]{float:left}.pagination .next[data-v-5c9f44c8]{float:right}",""])},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={name:"AlertPanel",props:["config","alerts","changePage","markAsRead"],computed:{hasNext:function(){if(!this.alerts)return!1;var e=this.alerts.total/this.alerts.per_page;return e>1&&this.alerts.current_page<e},hasPrev:function(){return!!this.alerts&&this.alerts.current_page>1}},methods:{togglePanel:function(){this.$emit("togglePanel")},alertRead:function(e){this.$emit("alertRead",e)},next:function(){this.$emit("changePage",this.alerts.current_page+1)},prev:function(){this.$emit("changePage",this.alerts.current_page-1)}}}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"text-white alerts-panel"},[n("div",{staticClass:"border-b border-80"},[n("div",{staticClass:"text-center px-6",attrs:{id:"alerts-panel-close"},on:{click:e.togglePanel}},[e._v("\n            Close\n        ")])]),e._v(" "),n("div",{staticClass:"px-4 border-b border-80 overflow-y-scroll h-full"},[e._l(e.alerts.items,function(t){return n("div",[n("alert-message",{attrs:{alert:t,config:e.config},on:{alertRead:function(t){return e.alertRead(t)}}})],1)}),e._v(" "),e.hasNext||e.hasPrev?n("div",{staticClass:"pagination"},[e.hasPrev?n("button",{staticClass:"prev",attrs:{role:"button"},on:{click:e.prev}},[e._v("\n                < Prev\n            ")]):e._e(),e._v(" "),e.hasNext?n("button",{staticClass:"next",attrs:{role:"button"},on:{click:e.next}},[e._v("\n                Next >\n            ")]):e._e()]):e._e()],2)])},staticRenderFns:[]}},function(e,t,n){var a=n(2)(n(19),n(20),!1,function(e){n(17)},null,null);e.exports=a.exports},function(e,t,n){var a=n(18);"string"==typeof a&&(a=[[e.i,a,""]]),a.locals&&(e.exports=a.locals);n(1)("17be38ac",a,!0,{})},function(e,t,n){(e.exports=n(0)(!1)).push([e.i,".read-alert{opacity:.7}",""])},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});t.default={name:"AlertMessage",props:["config","alert"],filters:{fromNow:function(e){return new moment.tz(e,"UTC").local().fromNow()}},methods:{handleClick:function(){(this.alert.read_at||(this.$emit("alertRead",this.alert),this.alert.read_at=moment()),this.alert.url)&&function(e,t){if(t){var n=window.open(e,"_blank");n&&n.focus&&n.focus()}else window.location.href=e}(this.alert.url,!this.config.open_links_in_same_window)}},computed:{clickable:function(){return!(!this.alert.url&&null!==this.alert.read_at)}}}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{class:e.alert.read_at?"read-alert":"unread-alert"},[n("div",{staticClass:"alert table table-fixed w-full",class:{"cursor-pointer":e.clickable},on:{click:e.handleClick}},[n("span",{staticClass:"table-cell w-8 align-top py-4"},["success"===e.alert.level?n("span",[n("svg",{staticClass:"svg-inline--fa fa-check-circle fa-w-16",attrs:{"aria-hidden":"true","data-prefix":"fas","data-icon":"check-circle",role:"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 512 512"}},[n("path",{attrs:{fill:"#88bb71",d:"M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"}})])]):e._e(),e._v(" "),"info"===e.alert.level?n("span",[n("svg",{staticClass:"svg-inline--fa fa-info-circle fa-w-16",attrs:{"aria-hidden":"true","data-prefix":"fas","data-icon":"info-circle",role:"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 512 512"}},[n("path",{attrs:{fill:"#A3CCEF",d:"M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"}})])]):"warning"===e.alert.level?n("span",[n("svg",{staticClass:"svg-inline--fa fa-exclamation-triangle fa-w-18",attrs:{"aria-hidden":"true","data-prefix":"fas","data-icon":"exclamation-triangle",role:"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 576 512"}},[n("path",{attrs:{fill:"#f4c739",d:"M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"}})])]):"error"===e.alert.level?n("span",[n("svg",{staticClass:"svg-inline--fa fa-exclamation-circle fa-w-16",attrs:{"aria-hidden":"true","data-prefix":"fas","data-icon":"exclamation-circle",role:"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 512 512"}},[n("path",{attrs:{fill:"#c62828",d:"M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"}})])]):e._e()]),e._v(" "),n("div",{staticClass:"table-cell w-full py-4 pl-4"},[n("h4",[e._v("\n                "+e._s(e.alert.title)+"\n                "),e.alert.url?n("span",[e._v("🔗")]):e._e()]),e._v(" "),n("p",[e._v(e._s(e.alert.body))]),e._v(" "),n("span",{staticClass:"text-sm text-70"},[e._v(e._s(e._f("fromNow")(e.alert.created_at)))])])])])},staticRenderFns:[]}}]);