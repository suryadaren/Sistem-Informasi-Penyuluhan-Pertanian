<?php

// Halaman Penyuluh Lapangan
Route::get('/penyuluh/profil','PenyuluhController@profil');
Route::put('/penyuluh/ubah_data/{id}','PenyuluhController@ubah_data');

Route::get('/penyuluh/notifikasi','PenyuluhController@notifikasi');
Route::get('/penyuluh/lihat_notifikasi','PenyuluhController@lihat_notifikasi');
Route::get('/penyuluh/lihat_jadwal_penyuluhan','PenyuluhController@lihat_jadwal_penyuluhan');
Route::get('/penyuluh/masukan_jadwal_penyuluhan','PenyuluhController@masukan_jadwal_penyuluhan');

Route::get('/penyuluh/buat_laporan_penyuluhan','PenyuluhController@buat_laporan_penyuluhan');
Route::post('/penyuluh/input_laporan_penyuluhan','PenyuluhController@input_laporan_penyuluhan');
Route::get('/penyuluh/daftar_laporan_penyuluhan','PenyuluhController@daftar_laporan_penyuluhan');
Route::get('/penyuluh/detail_laporan_penyuluhan/{id}','PenyuluhController@detail_laporan_penyuluhan');

Route::get('/penyuluh/buat_draft_programa','PenyuluhController@buat_draft_programa');
Route::post('/penyuluh/input_draft_programa','PenyuluhController@input_draft_programa');
Route::get('/penyuluh/daftar_draft_programa','PenyuluhController@daftar_draft_programa');
Route::get('/penyuluh/detail_draft_programa/{id}','PenyuluhController@detail_draft_programa');

Route::get('/penyuluh/daftar_kelompok_tani','PenyuluhController@daftar_kelompok_tani');
Route::get('/penyuluh/detail_data_kelompok_tani','PenyuluhController@detail_data_kelompok_tani');
Route::get('/penyuluh/daftar_surat_tugas','PenyuluhController@daftar_surat_tugas');
Route::get('/penyuluh/detail_surat_tugas','PenyuluhController@detail_surat_tugas');
Route::get('/penyuluh/daftar_proposal_dana','PenyuluhController@daftar_proposal_dana');
Route::get('/penyuluh/detail_proposal_dana','PenyuluhController@detail_proposal_dana');


// Halaman Kepala BPP
Route::get('/bpp/dashboard','BppController@dashboard');
Route::get('/bpp/profil','BppController@profil');
Route::put('/bpp/ubah_data/{id}','BppController@ubah_data');

Route::get('/bpp/notifikasi','BppController@notifikasi');
Route::get('/bpp/lihat_notifikasi','BppController@lihat_notifikasi');

Route::get('/bpp/daftar_laporan_penyuluhan','BppController@daftar_laporan_penyuluhan');
Route::get('/bpp/detail_laporan_penyuluhan/{id}','BppController@detail_laporan_penyuluhan');
Route::get('/bpp/process/{id}','BppController@process_laporan_penyuluhan');
Route::put('/bpp/input_process/{id}','BppController@input_process_laporan_penyuluhan');
Route::put('/bpp/setujui_laporan/{id}','BppController@setujui_laporan');

Route::get('/bpp/daftar_draft_programa','BppController@daftar_draft_programa');
Route::get('/bpp/detail_draft_programa/{id}','BppController@detail_draft_programa');
Route::get('/bpp/process_draft/{id}','BppController@process_draft_programa');
Route::put('/bpp/input_process_draft/{id}','BppController@input_process_draft_programa');

Route::get('/bpp/daftar_surat_tugas','BppController@daftar_surat_tugas');
Route::get('/bpp/detail_surat_tugas','BppController@detail_surat_tugas');

Route::get('/bpp/daftar_kelompok_tani','BppController@daftar_kelompok_tani');
Route::get('/bpp/detail_data_kelompok_tani','BppController@detail_data_kelompok_tani');
Route::get('/bpp/daftar_penyuluh_lapangan','BppController@daftar_penyuluh_lapangan');
Route::get('/bpp/detail_data_penyuluh_lapangan','BppController@detail_data_penyuluh_lapangan');
Route::get('/bpp/daftar_nagari','BppController@daftar_nagari');
Route::get('/bpp/detail_data_nagari','BppController@detail_data_nagari');


// Halaman Pegawai Dinas
Route::get('/pegawai_dinas/profil','PegawaiDinasController@profil');
Route::put('/pegawai_dinas/ubah_data/{id}','PegawaiDinasController@ubah_data');

Route::get('/pegawai_dinas/notifikasi','PegawaiDinasController@notifikasi');
Route::get('/pegawai_dinas/lihat_notifikasi','PegawaiDinasController@lihat_notifikasi');

Route::get('/pegawai_dinas/daftar_laporan_penyuluhan','PegawaiDinasController@daftar_laporan_penyuluhan');
Route::get('/pegawai_dinas/detail_laporan_penyuluhan/{id}','PegawaiDinasController@detail_laporan_penyuluhan');
Route::get('/pegawai_dinas/process/{id}','PegawaiDinasController@process_laporan_penyuluhan');
Route::put('/pegawai_dinas/input_process/{id}','PegawaiDinasController@input_process_laporan_penyuluhan');

Route::get('/pegawai_dinas/daftar_draft_programa','PegawaiDinasController@daftar_draft_programa');
Route::get('/pegawai_dinas/detail_draft_programa/{id}','PegawaiDinasController@detail_draft_programa');
Route::get('/pegawai_dinas/process_draft/{id}','PegawaiDinasController@process_draft_programa');
Route::put('/pegawai_dinas/input_process_draft/{id}','PegawaiDinasController@input_process_draft_programa');

Route::get('/pegawai_dinas/daftar_surat_tugas','PegawaiDinasController@daftar_surat_tugas');
Route::get('/pegawai_dinas/pilih_draft_surat','PegawaiDinasController@pilih_draft_surat');
Route::get('/pegawai_dinas/buat_surat_tugas/{id}','PegawaiDinasController@buat_surat_tugas');
Route::post('/pegawai_dinas/input_surat_tugas/{id}','PegawaiDinasController@input_surat_tugas');
Route::get('/pegawai_dinas/detail_surat_tugas/{id}','PegawaiDinasController@detail_surat_tugas');

Route::get('/pegawai_dinas/buat_proposal_dana','PegawaiDinasController@buat_proposal_dana');
Route::get('/pegawai_dinas/daftar_proposal_dana','PegawaiDinasController@daftar_proposal_dana');
Route::get('/pegawai_dinas/detail_proposal_dana','PegawaiDinasController@detail_proposal_dana');
Route::get('/pegawai_dinas/daftar_kelompok_tani','PegawaiDinasController@daftar_kelompok_tani');
Route::get('/pegawai_dinas/detail_data_kelompok_tani','PegawaiDinasController@detail_data_kelompok_tani');
Route::get('/pegawai_dinas/daftar_penyuluh_lapangan','PegawaiDinasController@daftar_penyuluh_lapangan');
Route::get('/pegawai_dinas/detail_data_penyuluh_lapangan','PegawaiDinasController@detail_data_penyuluh_lapangan');
Route::get('/pegawai_dinas/daftar_kepala_bpp','PegawaiDinasController@daftar_kepala_bpp');
Route::get('/pegawai_dinas/detail_data_kepala_bpp','PegawaiDinasController@detail_data_kepala_bpp');
Route::get('/pegawai_dinas/daftar_nagari','PegawaiDinasController@daftar_nagari');
Route::get('/pegawai_dinas/detail_data_nagari','PegawaiDinasController@detail_data_nagari');
Route::get('/pegawai_dinas/daftar_kecamatan','PegawaiDinasController@daftar_kecamatan');
Route::get('/pegawai_dinas/detail_data_kecamatan','PegawaiDinasController@detail_data_kecamatan');


// Halaman Kepala Dinas
Route::get('/kepala_dinas/profil','KepalaDinasController@profil');
Route::put('/kepala_dinas/ubah_data/{id}','KepalaDinasController@ubah_data');

Route::get('/kepala_dinas/notifikasi','KepalaDinasController@notifikasi');
Route::get('/kepala_dinas/lihat_notifikasi','KepalaDinasController@lihat_notifikasi');
Route::get('/kepala_dinas/daftar_surat_tugas','KepalaDinasController@daftar_surat_tugas');
Route::get('/kepala_dinas/detail_surat_tugas','KepalaDinasController@detail_surat_tugas');
Route::get('/kepala_dinas/daftar_proposal_dana','KepalaDinasController@daftar_proposal_dana');
Route::get('/kepala_dinas/detail_proposal_dana','KepalaDinasController@detail_proposal_dana');


// Halaman Admin
Route::get('/admin/profil','AdminController@profil');