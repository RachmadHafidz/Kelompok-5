package com.example.enotaris;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.view.MenuItem;
import android.widget.Toast;

import com.example.enotaris.notaris.ListBayar;
import com.example.enotaris.client.ListNotaris;

/**
 * Created by Hafizh Herdi on 3/5/2017.
 */

public class Dashboard extends AppCompatActivity {

    private BottomNavigationView bottomNavigationView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        setContentView(R.layout.activity_dashboard);

        bottomNavigationView = (BottomNavigationView) findViewById(R.id.btm_nav);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {

                switch (item.getItemId()){
                    case R.id.action_bayar :
                        Toast.makeText(Dashboard.this, "Home clicked", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(Dashboard.this, ListBayar.class);
                        startActivity(intent);
                        break;
                    case R.id.action_akta :
                        Toast.makeText(Dashboard.this, "Star clicked", Toast.LENGTH_SHORT).show();
                        Intent akta = new Intent(Dashboard.this, ListNotaris.class);
                        startActivity(akta);
                        break;
                    case R.id.action_profil :
                        Toast.makeText(Dashboard.this, "Money clicked", Toast.LENGTH_SHORT).show();
                        Intent profil = new Intent(Dashboard.this, Dashboard.class);
                        startActivity(profil);
                        break;
                }

                return true;
            }
        });

        super.onCreate(savedInstanceState);
    }

}