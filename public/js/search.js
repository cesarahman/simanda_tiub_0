$(document).ready(function() {

    $( function() {
        $.widget( "custom.catcomplete", $.ui.autocomplete, {
          _create: function() {
            this._super();
            this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
          },
          _renderMenu: function( ul, items ) {
            var that = this,
              currentCategory = "";
            $.each( items, function( index, item ) {
              var li;
              if ( item.category != currentCategory ) {
                ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                currentCategory = item.category;
              }
              li = that._renderItemData( ul, item );
              if ( item.category ) {
                li.attr( "aria-label", item.category + " : " + item.label );
              }
            });
          }
        });

        $.ajax({
            type:"get",
            url:"/cek-role",
            success: function(response){

                // console.log(response.data)
                if(response.data == 1){
                    var data = [
                        { label: "Edit Profile", category: "Akun" },
                        { label: "Edit Password", category: "Akun" },
                        { label: "Dashboard", category: "Dashboard" },
                        { label: "Data Pengguna", category: "Data Pengguna" },
                        { label: "History", category: "History" },
                        { label: "Semester", category: "Master Data" },
                        { label: "Jabatan", category: "Master Data" },
                        { label: "Bidang Keahlian", category: "Master Data" },
                        { label: "Social Media", category: "Mini Navbar" },
                        { label: "Quick Menu", category: "Mini Navbar" },
                        { label: "Headline", category: "Home" },
                        { label: "Berita", category: "Home" },
                        { label: "Pengumuman", category: "Home" },
                        { label: "Agenda", category: "Home" },
                        { label: "Kerja Sama", category: "Home" },
                        { label: "Sejarah", category: "Profile" },
                        { label: "Visi dan Misi", category: "Profile" },
                        { label: "Struktur Organisasi", category: "Profile" },
                        { label: "Prestasi", category: "Profile" },
                        { label: "Dosen", category: "Profile" },
                        { label: "Tenaga Kerja", category: "Profile" },
                        { label: "Akreditasi", category: "Akademik" },
                        { label: "Mahasiswa", category: "Akademik" },
                        { label: "Kalender Akademik", category: "Akademik" },
                        { label: "Jadwal Kuliah", category: "Akademik" },
                        { label: "Dokumen", category: "Akademik" },
                        { label: "OJT", category: "Akademik" },
                        { label: "Tugas Akhir", category: "Akademik" },
                        { label: "Kegiatan Akademik", category: "Akademik" },
                        { label: "Form", category: "Akademik" },
                        { label: "Organisasi", category: "Kemahasiswaan" },
                        { label: "Info Lomba / Seminar", category: "Kemahasiswaan" },
                        { label: "Kegiatan Prodi", category: "Kemahasiswaan" },
                        { label: "Lowongan", category: "Kemahasiswaan" },
                        { label: "Data Alumni", category: "Kemahasiswaan" },
                        { label: "Penelitian", category: "Riset" },
                        { label: "Pengabdian", category: "Riset" },
                        { label: "Fasilitas", category: "Fasilitas" },
                        { label: "Layanan UB", category: "Footer" },
                        { label: "FAQ", category: "Footer" },
                        { label: "Blog", category: "Footer" },
                      ];

                      $( "#search" ).catcomplete({
                        delay: 0,
                        source: data
                      });
                }else{
                    var data = [
                        { label: "Edit Profile", category: "Akun" },
                        { label: "Edit Password", category: "Akun" },
                        { label: "Dashboard", category: "Dashboard" },
                        { label: "Semester", category: "Master Data" },
                        { label: "Jabatan", category: "Master Data" },
                        { label: "Bidang Keahlian", category: "Master Data" },
                        { label: "Social Media", category: "Mini Navbar" },
                        { label: "Quick Menu", category: "Mini Navbar" },
                        { label: "Headline", category: "Home" },
                        { label: "Berita", category: "Home" },
                        { label: "Pengumuman", category: "Home" },
                        { label: "Agenda", category: "Home" },
                        { label: "Kerja Sama", category: "Home" },
                        { label: "Sejarah", category: "Profile" },
                        { label: "Visi dan Misi", category: "Profile" },
                        { label: "Struktur Organisasi", category: "Profile" },
                        { label: "Prestasi", category: "Profile" },
                        { label: "Dosen", category: "Profile" },
                        { label: "Tenaga Kerja", category: "Profile" },
                        { label: "Akreditasi", category: "Akademik" },
                        { label: "Mahasiswa", category: "Akademik" },
                        { label: "Kalender Akademik", category: "Akademik" },
                        { label: "Jadwal Kuliah", category: "Akademik" },
                        { label: "Dokumen", category: "Akademik" },
                        { label: "OJT", category: "Akademik" },
                        { label: "Tugas Akhir", category: "Akademik" },
                        { label: "Kegiatan Akademik", category: "Akademik" },
                        { label: "Form", category: "Akademik" },
                        { label: "Organisasi", category: "Kemahasiswaan" },
                        { label: "Info Lomba / Seminar", category: "Kemahasiswaan" },
                        { label: "Kegiatan Prodi", category: "Kemahasiswaan" },
                        { label: "Lowongan", category: "Kemahasiswaan" },
                        { label: "Data Alumni", category: "Kemahasiswaan" },
                        { label: "Penelitian", category: "Riset" },
                        { label: "Pengabdian", category: "Riset" },
                        { label: "Fasilitas", category: "Fasilitas" },
                        { label: "Layanan UB", category: "Footer" },
                        { label: "FAQ", category: "Footer" },
                        { label: "Blog", category: "Footer" },
                      ];

                      $( "#search" ).catcomplete({
                        delay: 0,
                        source: data
                      });
                }

            },
            error: function(err){
                console.log(err)
            }
        })

      });


    $("#search-button-layout").on("click", function(e){
        e.preventDefault()
        var nama_menu = $("#search").val()
        // console.log(name)

        $.ajax({
            type: "get",
            url: "/search-menu/"+nama_menu,
            success: function(response){

                if(response.data == null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Tidak Ditemukan',
                        text: 'Menu '+nama_menu+' tidak ditemukan!',
                    });
                }else{
                    window.location.href = response.data.url
                }
            },
            error: function(err){
                console.log(err)
            }
        })
    })

})

$(document).ready(function() {

    $( function() {
        $.widget( "custom.catcomplete", $.ui.autocomplete, {
          _create: function() {
            this._super();
            this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
          },
          _renderMenu: function( ul, items ) {
            var that = this,
              currentCategory = "";
            $.each( items, function( index, item ) {
              var li;
              if ( item.category != currentCategory ) {
                ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                currentCategory = item.category;
              }
              li = that._renderItemData( ul, item );
              if ( item.category ) {
                li.attr( "aria-label", item.category + " : " + item.label );
              }
            });
          }
        });

        $.ajax({
            type:"get",
            url:"/cek-role",
            success: function(response){

                // console.log(response.data)
                if(response.data == 1){
                    var data = [
                        { label: "Edit Profile", category: "Akun" },
                        { label: "Edit Password", category: "Akun" },
                        { label: "Dashboard", category: "Dashboard" },
                        { label: "Data Pengguna", category: "Data Pengguna" },
                        { label: "History", category: "History" },
                        { label: "Semester", category: "Master Data" },
                        { label: "Jabatan", category: "Master Data" },
                        { label: "Bidang Keahlian", category: "Master Data" },
                        { label: "Social Media", category: "Mini Navbar" },
                        { label: "Quick Menu", category: "Mini Navbar" },
                        { label: "Headline", category: "Home" },
                        { label: "Berita", category: "Home" },
                        { label: "Pengumuman", category: "Home" },
                        { label: "Agenda", category: "Home" },
                        { label: "Kerja Sama", category: "Home" },
                        { label: "Sejarah", category: "Profile" },
                        { label: "Visi dan Misi", category: "Profile" },
                        { label: "Struktur Organisasi", category: "Profile" },
                        { label: "Prestasi", category: "Profile" },
                        { label: "Dosen", category: "Profile" },
                        { label: "Tenaga Kerja", category: "Profile" },
                        { label: "Akreditasi", category: "Akademik" },
                        { label: "Mahasiswa", category: "Akademik" },
                        { label: "Kalender Akademik", category: "Akademik" },
                        { label: "Jadwal Kuliah", category: "Akademik" },
                        { label: "Dokumen", category: "Akademik" },
                        { label: "OJT", category: "Akademik" },
                        { label: "Tugas Akhir", category: "Akademik" },
                        { label: "Kegiatan Akademik", category: "Akademik" },
                        { label: "Form", category: "Akademik" },
                        { label: "Organisasi", category: "Kemahasiswaan" },
                        { label: "Info Lomba / Seminar", category: "Kemahasiswaan" },
                        { label: "Kegiatan Prodi", category: "Kemahasiswaan" },
                        { label: "Lowongan", category: "Kemahasiswaan" },
                        { label: "Data Alumni", category: "Kemahasiswaan" },
                        { label: "Penelitian", category: "Riset" },
                        { label: "Pengabdian", category: "Riset" },
                        { label: "Fasilitas", category: "Fasilitas" },
                        { label: "Layanan UB", category: "Footer" },
                        { label: "FAQ", category: "Footer" },
                        { label: "Blog", category: "Footer" },
                      ];

                      $( "#search2" ).catcomplete({
                        delay: 0,
                        source: data
                      });
                }else{
                    var data = [
                        { label: "Edit Profile", category: "Akun" },
                        { label: "Edit Password", category: "Akun" },
                        { label: "Dashboard", category: "Dashboard" },
                        { label: "Semester", category: "Master Data" },
                        { label: "Jabatan", category: "Master Data" },
                        { label: "Bidang Keahlian", category: "Master Data" },
                        { label: "Social Media", category: "Mini Navbar" },
                        { label: "Quick Menu", category: "Mini Navbar" },
                        { label: "Headline", category: "Home" },
                        { label: "Berita", category: "Home" },
                        { label: "Pengumuman", category: "Home" },
                        { label: "Agenda", category: "Home" },
                        { label: "Kerja Sama", category: "Home" },
                        { label: "Sejarah", category: "Profile" },
                        { label: "Visi dan Misi", category: "Profile" },
                        { label: "Struktur Organisasi", category: "Profile" },
                        { label: "Prestasi", category: "Profile" },
                        { label: "Dosen", category: "Profile" },
                        { label: "Tenaga Kerja", category: "Profile" },
                        { label: "Akreditasi", category: "Akademik" },
                        { label: "Mahasiswa", category: "Akademik" },
                        { label: "Kalender Akademik", category: "Akademik" },
                        { label: "Jadwal Kuliah", category: "Akademik" },
                        { label: "Dokumen", category: "Akademik" },
                        { label: "OJT", category: "Akademik" },
                        { label: "Tugas Akhir", category: "Akademik" },
                        { label: "Kegiatan Akademik", category: "Akademik" },
                        { label: "Form", category: "Akademik" },
                        { label: "Organisasi", category: "Kemahasiswaan" },
                        { label: "Info Lomba / Seminar", category: "Kemahasiswaan" },
                        { label: "Kegiatan Prodi", category: "Kemahasiswaan" },
                        { label: "Lowongan", category: "Kemahasiswaan" },
                        { label: "Data Alumni", category: "Kemahasiswaan" },
                        { label: "Penelitian", category: "Riset" },
                        { label: "Pengabdian", category: "Riset" },
                        { label: "Fasilitas", category: "Fasilitas" },
                        { label: "Layanan UB", category: "Footer" },
                        { label: "FAQ", category: "Footer" },
                        { label: "Blog", category: "Footer" },
                      ];

                      $( "#search2" ).catcomplete({
                        delay: 0,
                        source: data
                      });
                }

            },
            error: function(err){
                console.log(err)
            }
        })

      });


    $("#search-button-layout2").on("click", function(e){
        e.preventDefault()
        var nama_menu = $("#search2").val()
        // console.log(name)

        $.ajax({
            type: "get",
            url: "/search-menu/"+nama_menu,
            success: function(response){

                if(response.data == null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Tidak Ditemukan',
                        text: 'Menu '+nama_menu+' tidak ditemukan!',
                    });
                }else{
                    window.location.href = response.data.url
                }
            },
            error: function(err){
                console.log(err)
            }
        })
    })

})
