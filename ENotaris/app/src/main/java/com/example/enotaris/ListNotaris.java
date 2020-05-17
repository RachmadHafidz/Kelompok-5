package com.example.enotaris;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;

import java.util.ArrayList;
import java.util.List;

public class ListNotaris extends AppCompatActivity {
    private RecyclerView rvList;
    private RecyclerAdapter adapter;
    private List<Notaris> listMahasiswa = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.menuclient);

        rvList = findViewById(R.id.rv_list);

        Notaris m1 = new Notaris("Dandi", "Jl. Mawar", "Rp. 25.000");
        Notaris m2 = new Notaris("Rahmat", "Jl. Kamboja", "Rp. 25.000");

        listMahasiswa.add(0, m1);
        listMahasiswa.add(1, m2);

        adapter = new RecyclerAdapter(this);
        adapter.setListMahasiswa(listMahasiswa);

        rvList.setLayoutManager(new LinearLayoutManager(this));
        rvList.setAdapter(adapter);
    }
}
