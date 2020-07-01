package com.example.enotaris.notaris;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.MenuItem;
import android.widget.ListView;
import android.widget.Toast;


import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.enotaris.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class MainNot extends AppCompatActivity {
private String URL_Bayar = "http://192.168.1.7/Kelompok-5/restnot/index.php/pembayaran";
private static ProgressDialog mProgressDialog;
        private BottomNavigationView bottomNavigationView;
private ListView listView;
        ArrayList<ModelData> dataModelArrayList;
private ListAdapter listAdapter;
@Override
protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.bayar);
        listView = findViewById(R.id.list);
        retrieveJSON();
        bottomNavigationView = (BottomNavigationView) findViewById(R.id.btm_nav);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
                @Override
                public boolean onNavigationItemSelected(@NonNull MenuItem item) {

                        switch (item.getItemId()){
                                case R.id.action_bayar :
                                        Intent bayar = new Intent(MainNot.this, ListBayar.class);
                                        startActivity(bayar);

                                        break;
                                case R.id.action_akta :
                                        Intent akta = new Intent(MainNot.this, ListAkta.class);
                                        startActivity(akta);

                                        break;
                                case R.id.action_profil2 :


                                        break;
                        }

                        return true;
                }
        });
        }private void retrieveJSON() {
        showSimpleProgressDialog(this, "Loading...","Fetching Json",false);
        StringRequest stringRequest = new
        StringRequest(Request.Method.GET, URL_Bayar,
        new Response.Listener<String>() {
@Override
public void onResponse(String response) {
        Log.d("strrrrr", ">>" + response);
        try {
        JSONObject obj = new JSONObject(response);
        if(obj.optString("status").equals("true")){
        dataModelArrayList = new ArrayList<>();
        JSONArray dataArray =
        obj.getJSONArray("data");
        for (int i = 0; i < dataArray.length();
        i++) {
        ModelData playerModel = new
        ModelData();
        JSONObject dataobj =
        dataArray.getJSONObject(i);
        playerModel.setNama(dataobj.getString("nama"));
        playerModel.setJenis(dataobj.getString("jenis"));
        playerModel.setStatus(dataobj.getString("status_pembayaran"));

        dataModelArrayList.add(playerModel);
        }
        setupListview();
        }
        } catch (JSONException e) {
        e.printStackTrace();
        }
        }
        },new Response.ErrorListener() {
@Override
public void onErrorResponse(VolleyError error)
        {
//displaying the error in toast if occurrs
        Toast.makeText(getApplicationContext(),
        error.getMessage(), Toast.LENGTH_SHORT).show();
        }
        });
// request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
        }
private void setupListview(){
        removeSimpleProgressDialog(); //will remove progress dialog
        listAdapter = new ListAdapter(this, dataModelArrayList);
        listView.setAdapter(listAdapter);
        }
public static void removeSimpleProgressDialog() {
        try {
        if (mProgressDialog != null) {
        if (mProgressDialog.isShowing()) {
        mProgressDialog.dismiss();
        mProgressDialog = null;
        }
        }
        } catch (IllegalArgumentException ie) {
        ie.printStackTrace();
        } catch (RuntimeException re) {
        re.printStackTrace();
        } catch (Exception e) {
        e.printStackTrace();
        }
        }
public static void showSimpleProgressDialog(Context context,
        String title,
        String msg,
        boolean isCancelable) {
        try {
        if (mProgressDialog == null) {
        mProgressDialog = ProgressDialog.show(context,
        title, msg);
        mProgressDialog.setCancelable(isCancelable);
        }
        if (!mProgressDialog.isShowing()) {
        mProgressDialog.show();
        }} catch (IllegalArgumentException ie) {
        ie.printStackTrace();
        } catch (RuntimeException re) {
        re.printStackTrace();
        } catch (Exception e) {
        e.printStackTrace();
        }
        }

        }