package com.example.enotaris;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;


import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class RegisterActivity extends AppCompatActivity {
    EditText email,password,nama,telp;
    Button daftar2;
    RequestQueue requestQueue;
    String NamaHolder,TelpHolder,EmailHolder,PasswordHolder;
    ProgressDialog progressDialog;
    String HttpUrl="http://192.168.1.7/volley/daftar.php";
    Boolean CheckEditText;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        email=findViewById(R.id.email);
        password=findViewById(R.id.password);
        nama=findViewById(R.id.nama);
        telp=findViewById(R.id.telp);
        daftar2=findViewById(R.id.daftar2);
        requestQueue = Volley.newRequestQueue(RegisterActivity.this);
        progressDialog= new ProgressDialog(RegisterActivity.this);

        daftar2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                CheckEditTextIsEmptyOrNot();
                if (CheckEditText){
                    UserRegistration();
                }else {
                    Toast.makeText(RegisterActivity.this,"Penuhi form",Toast.LENGTH_LONG).show();
                }
            }
        });

    }

    public void UserRegistration() {
        progressDialog.setMessage("sedang proses masukkan data");
        progressDialog.show();
        StringRequest stringRequest =new StringRequest(Request.Method.POST, HttpUrl,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String ServerResponse) {
                        progressDialog.dismiss();

                        Toast.makeText(RegisterActivity.this, ServerResponse, Toast.LENGTH_LONG).show();
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {
                        progressDialog.dismiss();

                        Toast.makeText(RegisterActivity.this,volleyError.toString(),Toast.LENGTH_LONG).show();
                    }
                }){
            @Override
            protected Map<String, String> getParams() {
                Map<String,String> params = new HashMap<>();
                params.put("nama",NamaHolder);
                params.put("no_telp",TelpHolder);
                params.put("email",EmailHolder);
                params.put("password",PasswordHolder);
                return params;
            }
        };
        RequestQueue requestQueue= Volley.newRequestQueue(RegisterActivity.this);
        requestQueue.add(stringRequest);
    }

    public void CheckEditTextIsEmptyOrNot() {
        NamaHolder=nama.getText().toString().trim();
        TelpHolder=telp.getText().toString().trim();
        EmailHolder=email.getText().toString().trim();
        PasswordHolder=password.getText().toString().trim();
        if (TextUtils.isEmpty(NamaHolder) || TextUtils.isEmpty(TelpHolder) || TextUtils.isEmpty(EmailHolder) || TextUtils.isEmpty(PasswordHolder)){
            CheckEditText=false;
        }
        else {
            CheckEditText=true;
        }
    }
}
