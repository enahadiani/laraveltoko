jQuery.extend(jQuery.validator.messages, {
    required: "Wajib diisi",
    remote: "Perbaiki field ini",
    email: "Harap isi alamat email yang valid",
    url: "Harap isi url yang valid",
    date: "Harap isi tanggal yang valid",
    dateISO: "Harap isi tanggal (ISO) yang valid.",
    number: "Harap isi dengan angka yang valid",
    digits: "Harap isi hanya digits.",
    creditcard: "Harap isi dengan nomor kartu kredit yang valid.",
    equalTo: "Harap isi dengan nilai yang sama lagi",
    accept: "Harap isi sesuai esktensi yang ditentukan",
    maxlength: jQuery.validator.format("Harap isi tidak lebih dari {0} karakter."),
    minlength: jQuery.validator.format("Harap isi minimal {0} karakter."),
    rangelength: jQuery.validator.format("Harap isi antara {0} dan {1} karakter."),
    range: jQuery.validator.format("Harap isi dengan nilai antara {0} dan {1}."),
    max: jQuery.validator.format("Harap isi dengan nilai kurang dari sama dengan {0}."),
    min: jQuery.validator.format("Harap isi dengan nilai lebih besar atau sama dengan {0}.")
});