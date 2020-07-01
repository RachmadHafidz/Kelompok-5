package com.example.enotaris.client;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.MenuItem;
import android.widget.Toast;

import com.example.enotaris.Dashboard;
import com.example.enotaris.R;
import com.example.enotaris.notaris.ListBayar;

import java.util.ArrayList;
import java.util.List;

public class ListNotaris extends AppCompatActivity {
    private RecyclerView rvList;
    private ViewData adapter;
    private List<Notaris> listMahasiswa = new ArrayList<>();
    private BottomNavigationView bottomNavigationView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.menuclient);

        rvList = findViewById(R.id.rv_list);

        Notaris m1 = new Notaris("Kusnadi S.H", "Jl. Raya Kenongo No. 9, Sidoarjo", "Rp 300.000 - Rp 2.000.000");
        Notaris m2 = new Notaris("Firmansyah S.H", "Jl. Kaliwates No. 89, Jember", "Rp 400.000 - Rp 1.250.000");
        Notaris m3 = new Notaris("Dwi Tiara S.H", "Jl Raya Waru, No 90 A. Sidoarjo", "Rp 200.000 - Rp 1.500.000");

        listMahasiswa.add(0, m1);
        listMahasiswa.add(1, m2);
        listMahasiswa.add(2, m3);

        adapter = new ViewData(this);
        adapter.setListMahasiswa(listMahasiswa);

        rvList.setLayoutManager(new LinearLayoutManager(this));
        rvList.setAdapter(adapter);

        bottomNavigationView = (BottomNavigationView) findViewById(R.id.btm_nav2);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {

                switch (item.getItemId()){
                    case R.id.action_daftar :

                        Intent intent = new Intent(ListNotaris.this, ListNotaris.class);
                        startActivity(intent);
                        break;
                    case R.id.action_chat :


                        break;
                    case R.id.action_profil2 :


                        break;
                }

                return true;
            }
        });
    }
}

