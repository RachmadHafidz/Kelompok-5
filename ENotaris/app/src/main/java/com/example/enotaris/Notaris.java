package com.example.enotaris;

public class Notaris {

    private String nama;
    private String alamat;
    private String biaya;


    public Notaris( String nama, String alamat, String biaya) {

        this.nama = nama;
        this.alamat = alamat;
        this.biaya = biaya;

    }



    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String jurusan) {
        this.alamat = jurusan;
    }

    public String getBiaya() {
        return biaya;
    }

    public void setBiaya(String biaya) {
        this.biaya = biaya;
    }


}