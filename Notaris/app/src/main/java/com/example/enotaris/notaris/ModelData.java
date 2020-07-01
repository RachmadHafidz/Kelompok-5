package com.example.enotaris.notaris;

public class ModelData {
    String snama, sjenis, sstatus;

    public ModelData() {
    }

    public ModelData(String nama, String jenis, String status) {
        this.snama = nama;
        this.sjenis = jenis;
        this.sstatus = status;
    }


    public String getNama() {
        return snama;
    }

    public void setNama(String nama) {
        this.snama = nama;
    }

    public String getJenis() {
        return sjenis;
    }

    public void setJenis(String jenis) {
        this.sjenis = jenis;
    }

    public String getStatus() {
        return sstatus;
    }

    public void setStatus(String status) {
        this.sstatus = status;
    }
}
