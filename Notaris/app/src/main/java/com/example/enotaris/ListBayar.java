package com.example.enotaris;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import java.util.ArrayList;
import java.util.HashMap;

public class ListBayar extends AppCompatActivity {


    private TextView txtnama, txtjenis, txtstatus;

    private RequestQueue requestQueue;
    private StringRequest stringRequest;

    ArrayList<HashMap<String, String>> list_data;

    @Override    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.pembayaran);

        String url = "http://192.168.1.7/kelompok-5/android/pembayaran.php"; //sesuaikan dengan ip pc anda
        txtnama = (TextView)findViewById(R.id.tv_nama);
        txtjenis = (TextView)findViewById(R.id.tv_jenis);
        txtstatus = (TextView)findViewById(R.id.tv_status);

        requestQueue = Volley.newRequestQueue(ListBayar.this);

        list_data = new ArrayList<HashMap<String, String>>();

        stringRequest = new StringRequest(Request.Method.GET, url, new Response.Listener<String>() {
            @Override            public void onResponse(String response) {
                try {
                    JSONObject jsonObject = new JSONObject(response);
                    JSONArray jsonArray = jsonObject.getJSONArray("pembayaran");
                    for (int a = 0; a < jsonArray.length(); a ++){
                        JSONObject json = jsonArray.getJSONObject(a);
                        HashMap<String, String> map  = new HashMap<String, String>();
                        map.put("id_pembayaran", json.getString("id_pembayaran"));
                        map.put("nama", json.getString("nama"));
                        map.put("jenis", json.getString("jenis"));
                        map.put("status_pembayaran", json.getString("status_pembayaran"));
                        list_data.add(map);
                    }
                    txtnama.setText(list_data.get(0).get("nama"));
                    txtjenis.setText(list_data.get(0).get("jenis"));
                    txtstatus.setText(list_data.get(0).get("status_pembayaran"));
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override            public void onErrorResponse(VolleyError error) {
                Toast.makeText(ListBayar.this, error.getMessage(), Toast.LENGTH_LONG).show();
            }
        });

        requestQueue.add(stringRequest);
    }
}