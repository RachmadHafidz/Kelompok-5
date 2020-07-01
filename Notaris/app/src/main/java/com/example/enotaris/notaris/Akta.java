package com.example.enotaris.notaris;

public class Akta {

    private String namaa;
    private String jeniss;
    private String tgl;
    private String ket;
    private String cat;
    private String ak;
    private String lap;


    public Akta( String namaa, String jeniss, String tgl, String ket, String cat, String ak, String lap) {

        this.namaa = namaa;
        this.jeniss = jeniss;
        this.tgl = tgl;
        this.ket = ket;
        this.cat = cat;
        this.ak = ak;
        this.lap = lap;

    }



    public String getNamaa() {
        return namaa;
    }

    public void setNamaa(String namaa) {
        this.namaa = namaa;
    }

    public String getJeniss() {
        return jeniss;
    }

    public void setJeniss(String jeniss) {
        this.jeniss = jeniss;
    }

    public String getTgl() {
        return tgl;
    }

    public void setTgl(String tgl) { this.tgl = tgl; }

    public String getKet() {
        return ket;
    }

    public void setKet(String ket) {
        this.ket = ket;
    }

    public String getCat() {
        return cat;
    }

    public void setCat(String cat) {
        this.cat = cat;
    }

    public String getAk() {
        return ak;
    }

    public void setAk(String ak) {
        this.ak = ak;
    }

    public String getLap() {
        return lap;
    }

    public void setLap(String lap) {
        this.lap = lap;
    }


}