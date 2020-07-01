package com.example.enotaris.notaris;

import android.annotation.SuppressLint;
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
import com.example.enotaris.client.ListNotaris;

import java.util.ArrayList;
import java.util.List;

public class ListAkta extends AppCompatActivity {
    private RecyclerView List;
    private ViewAkta adapter;
    private List<Akta> listAkta = new ArrayList<>();
    private BottomNavigationView bottomNavigationView;

    @SuppressLint("WrongViewCast")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.list_akta);

        List = findViewById(R.id.rv_list_akta);

        Akta n1 = new Akta("Ghea", "Akta Jual Beli", "20-05-2020", "Sedang diproses",
                "Belum ada catatan", "Belum ada akta","salah harga");



        listAkta.add(0, n1);



        adapter = new ViewAkta(this);
        adapter.setListAkta(listAkta);

        List.setLayoutManager(new LinearLayoutManager(this));
        List.setAdapter(adapter);

        bottomNavigationView = (BottomNavigationView) findViewById(R.id.btm_nav);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {

                switch (item.getItemId()){
                    case R.id.action_bayar :

                        Intent bayar = new Intent(ListAkta.this, ListBayar.class);
                        startActivity(bayar);
                        break;
                    case R.id.action_akta :
                        Intent akta = new Intent(ListAkta.this, ListAkta.class);
                        startActivity(akta);

                        break;
                    case R.id.action_profil2 :


                        break;
                }

                return true;
            }
        });

    }
}

