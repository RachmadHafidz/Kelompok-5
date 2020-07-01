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

import com.example.enotaris.R;
import com.example.enotaris.client.Notaris;

import java.util.ArrayList;
import java.util.List;

public class ListBayar extends AppCompatActivity {
    private RecyclerView List;
    private ViewBayar adapter;
    private List<ModelData> listBayar = new ArrayList<>();
    private BottomNavigationView bottomNavigationView;

    @SuppressLint("WrongViewCast")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.bayar);

        List = findViewById(R.id.list);

        ModelData m1 = new ModelData("Ghea","Akta Jual Beli","Belum Lunas");
        ModelData m2 = new ModelData("Ghea","Akta Jual Beli","Belum Lunas");


        listBayar.add(0, m1);
        listBayar.add(1, m2);


        adapter = new ViewBayar(this);
        adapter.setListBayar(listBayar);

       List.setLayoutManager(new LinearLayoutManager(this));
        List.setAdapter(adapter);

        bottomNavigationView = (BottomNavigationView) findViewById(R.id.btm_nav);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {

                switch (item.getItemId()){
                    case R.id.action_bayar :
                        Intent bayar = new Intent(ListBayar.this, ListBayar.class);
                        startActivity(bayar);

                        break;
                    case R.id.action_akta :
                        Intent akta = new Intent(ListBayar.this, ListAkta.class);
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

