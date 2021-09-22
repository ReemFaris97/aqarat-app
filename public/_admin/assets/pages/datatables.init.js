/**
* Theme: Adminto Admin Template
* Author: Coderthemes
* Component: Datatable
*
*/

var handleDataTableButtons = function() {
    "use strict";
    0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
        dom: "Bfrtip",
        language:{
            url:'Arabic.json'
        },
        buttons: [{
            extend: "copy",
            className: "btn-sm"
        }, {
            extend: "csv",
            className: "btn-sm"
        }, {
            extend: "excel",
            className: "btn-sm"
        }, {
            extend: "print",
            className: "btn-sm",
            customize: function (win) {
                $(win.document.body).css('direction', 'rtl');
            }
        }],
        responsive: !0
    })
},
TableManageButtons = function() {
    "use strict";
    return {
        init: function() {
            handleDataTableButtons()
        }
    }
}();
