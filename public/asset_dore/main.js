function sepNumX(x) {
    if (typeof x === "undefined" || !x) {
        return 0;
    } else {
        if (x < 0) {
            var x = parseFloat(x).toFixed(0);
        }

        var parts = x.toString().split(",");
        parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g, "$1.");
        return parts.join(".");
    }
}

function showNotification(placementFrom, placementAlign, type, title, message) {
    $.notify(
        {
            title: title,
            message: message,
            target: "_blank",
        },
        {
            element: "body",
            position: null,
            type: type,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: placementFrom,
                align: placementAlign,
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 4000,
            timer: 2000,
            url_target: "_blank",
            mouse_over: null,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp",
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: "class",
            template:
                '<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                "</div>",
        }
    );
}

function jumFilter() {
    var jum = $("[name^=inp-filter]").filter(function () {
        return this.value.trim() != "";
    }).length;
    if (jum > 0) {
        $("#jum-filter").text(jum);
        if ($("#jum-filter2").length > 0) {
            $("#jum-filter2").text(jum);
        }
    } else {
        $("#jum-filter").text("");
        if ($("#jum-filter2").length > 0) {
            $("#jum-filter2").text("");
        }
    }
}

function storageChange(event) {
    if (event.key === "logged_in") {
        if (window.localStorage.getItem("logged_in") == "false") {
            window.localStorage.removeItem("siaga-form");
            window.location.href = "{{ url('siaga-auth/sesi-habis') }}";
        }
    }
}

function logout() {
    msgDialog({
        id: null,
        type: "logout",
    });
}

function newForm() {
    $("#row-id").hide();
    $("#method").val("post");
    $("[id^=label]").each(function (e) {
        $(this).text("");
    });
    $("[class^=info-name]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class^=input-group-text]:not(#filter-btn)").each(function (e) {
        $(this).text("");
    });
    $("[class^=input-group-prepend]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class*='inp-label-']").each(function (e) {
        $(this).removeAttr("style");
    });
    $("[class^=info-code]").each(function (e) {
        $(this).text("");
    });
    $("[class^=simple-icon-close]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("#id_edit").val("");
    $('input[data-input="cbbl"]').val("");
    $("#btn-update").attr("id", "btn-save");
    $("#btn-save").attr("type", "submit");
    $("#form-tambah")[0].reset();
    $("#form-tambah").validate().resetForm();
    $("#id").val("");
    $("#saku-datatable").hide();
    $("#saku-form").show();
}

function resetForm() {
    $("#row-id").hide();
    $("#method").val("post");
    $("[id^=label]").each(function (e) {
        $(this).text("");
    });
    $("[class^=info-name]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class^=input-group-text]:not(#filter-btn)").each(function (e) {
        $(this).text("");
    });
    $("[class^=input-group-prepend]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class*='inp-label-']").each(function (e) {
        $(this).removeAttr("style");
    });
    $("[class^=info-code]").each(function (e) {
        $(this).text("");
    });
    $("[class^=simple-icon-close]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("#id_edit").val("");
    $('input[data-input="cbbl"]').val("");
    $("#btn-update").attr("id", "btn-save");
    $("#btn-save").attr("type", "submit");
    $("#form-tambah")[0].reset();
    $("#form-tambah").validate().resetForm();
    $("#id").val("");
}

function format_number(x) {
    var num = parseFloat(x).toFixed(0);
    num = sepNumX(num);
    return num;
}

function last_add(table, param, isi) {
    var rowIndexes = [];
    table.rows(function (idx, data, node) {
        if (data[param] === isi) {
            rowIndexes.push(idx);
        }
        return false;
    });
    table.row(rowIndexes).select();
    $(".selected td:eq(0)").addClass("last-add");
    console.log("last-add");
    setTimeout(function () {
        console.log("timeout");
        $(".selected td:eq(0)").removeClass("last-add");
        table.row(rowIndexes).deselect();
    }, 1000 * 60 * 10);
}

function showInfoField(kode, isi_kode, isi_nama) {
    $("#" + kode).val(isi_kode);
    $("#" + kode).attr(
        "style",
        "border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important;color: #ffffff !important;"
    );
    $(".info-code_" + kode)
        .text(isi_kode)
        .parent("div")
        .removeClass("hidden");
    $(".info-code_" + kode).attr("title", isi_nama);
    $(".info-name_" + kode).removeClass("hidden");
    $(".info-name_" + kode).attr("title", isi_nama);
    $(".info-name_" + kode).css({ width: "68%", left: "30px" });
    $(".info-name_" + kode + " span").text(isi_nama);
    $(".info-name_" + kode)
        .closest("div")
        .find(".info-icon-hapus")
        .removeClass("hidden");
}

function reverseDateNew(date_str, separator, newseparator) {
    if (typeof separator === "undefined") {
        separator = "-";
    }
    date_str = date_str.split(" ");
    var str = date_str[0].split(separator);

    return str[2] + newseparator + str[1] + newseparator + str[0];
}

function sepNum(x) {
    var num = parseFloat(x).toFixed(0);
    var parts = num.toString().split(".");
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g, "$1.");
    return parts.join(",");
}

function toRp(num) {
    if (num < 0) {
        return "(" + sepNum(num * -1) + ")";
    } else {
        return sepNum(num);
    }
}

function toNilai(str_num) {
    var parts = str_num.split(".");
    number = parts.join("");
    number = number.replace("Rp", "");
    number = number.replace(",", ".");
    return +number;
}


function LTrim ( value ) {
	if (typeof(value) != "string") return value;
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");
	
};
// Removes ending whitespaces
function RTrim ( value ) {	
	if (typeof(value) != "string") return value;
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");	
};

function trim ( value ) {	
	return LTrim(RTrim(value));	
};

// function terbilang(int){
//     angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
//     int = Math.floor(int);
//     if (int < 12)
//         return " " + angka[int];
//     else if (int < 20)
//         return terbilang(int - 10) + " belas";
//     else if (int < 100)
//         return terbilang(int / 10) + " puluh" + terbilang(int % 10);
//     else if (int < 200)
//         return " seratus" + terbilang(int - 100);
//     else if (int < 1000)
//         return terbilang(int / 100) + " ratus" + terbilang(int % 100);
//     else if (int < 2000)
//         return " seribu" + terbilang(int - 1000);
//     else if (int < 1000000)
//         return terbilang(int / 1000) + " ribu" + terbilang(int % 1000);
//     else if (int < 1000000000)
//         return terbilang(int / 1000000) + " juta" + terbilang(int % 1000000);
//     else if (int < 1000000000000)
//         return terbilang(int / 1000000) + " milyar" + terbilang(int % 1000000000);
//     else if (int >= 1000000000000)
//         return terbilang(int / 1000000) + " trilyun" + terbilang(int % 1000000000000);
// }

function terbilang(bilangan, curr=" Rupiah") {
    bilangan= parseInt(bilangan).toString();
    var angka = ['0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0'];
    var kata = ['','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan'];
    var tingkat = ['','Ribu','Juta','Milyar','Triliun'];
    var kalimat = "";  
    var panjang_bilangan = bilangan.length;
    /* pengujian panjang bilangan */
    if (panjang_bilangan > 15) {
      kalimat = "Diluar Batas";
      return kalimat;
    }

    /* mengambil angka-angka yang ada dalam bilangan,
       dimasukkan ke dalam array */
    for (var i = 1; i <= panjang_bilangan; i++) {
      angka[i] = bilangan.substr(-i,1);
    } 
    var i = 1;
    var j = 0;
    var subkalimat,kata1,kata2,kata3;
    kalimat = "";
    /* mulai proses iterasi terhadap array angka */
    while (i <= panjang_bilangan) {
      subkalimat = "";
      kata1 = "";
      kata2 = "";
      kata3 = "";
      /* untuk ratusan */
      if (angka[i+2] != "0") {
        if (angka[i+2] == "1") {
          kata1 = " Seratus";
        } else {
          kata1 = kata[angka[i+2]] + " Ratus";
        }
      }

      /* untuk puluhan atau belasan */
      if (angka[i+1] != "0") {
        if (angka[i+1] == "1") {
          if (angka[i] == "0") {
            kata2 = "Sepuluh";
          } else if (angka[i] == "1") {
            kata2 = "Sebelas";
          } else {
            kata2 = kata[angka[i]] + " Belas";
          }
        } else {
          kata2 = kata[angka[i+1]] + " Puluh";
        }
      }

      /* untuk satuan */
      if (angka[i] != "0") {
        if (angka[i+1] != "1") {
          kata3 = kata[angka[i]];
        }
      }

      /* pengujian angka apakah tidak nol semua,
         lalu ditambahkan tingkat */
      if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
         subkalimat = kata1 + " "+kata2 + " "+kata3 +"  "+tingkat[j];
      }
      /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
         ke variabel kalimat */
      kalimat = subkalimat + kalimat;
      i = i + 3;
      j = j + 1;

    }

    /* mengganti satu ribu jadi seribu jika diperlukan */
    if ((angka[5] == "0") && (angka[6] == "0")) {
         kalimat = kalimat.replace("Satu  Ribu","Seribu");
    }
    kalimat=kalimat + curr;
    return trim(kalimat);
};


function getNamaBulan(no_bulan) {
    switch (no_bulan) {
        case 1:
        case "1":
        case "01":
            bulan = "Januari";
            break;
        case 2:
        case "2":
        case "02":
            bulan = "Februari";
            break;
        case 3:
        case "3":
        case "03":
            bulan = "Maret";
            break;
        case 4:
        case "4":
        case "04":
            bulan = "April";
            break;
        case 5:
        case "5":
        case "05":
            bulan = "Mei";
            break;
        case 6:
        case "6":
        case "06":
            bulan = "Juni";
            break;
        case 7:
        case "7":
        case "07":
            bulan = "Juli";
            break;
        case 8:
        case "8":
        case "08":
            bulan = "Agustus";
            break;
        case 9:
        case "9":
        case "09":
            bulan = "September";
            break;
        case 10:
        case "10":
        case "10":
            bulan = "Oktober";
            break;
        case 11:
        case "11":
        case "11":
            bulan = "November";
            break;
        case 12:
        case "12":
        case "12":
            bulan = "Desember";
            break;
        default:
            bulan = null;
    }

    return bulan;
}
