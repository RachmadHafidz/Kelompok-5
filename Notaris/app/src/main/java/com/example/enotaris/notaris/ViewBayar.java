package com.example.enotaris.notaris;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.enotaris.R;

import java.util.ArrayList;
import java.util.List;

public class ViewBayar extends RecyclerView.Adapter<ViewBayar.ViewHolder> {
    private Context context;
    private List<ModelData> listBayar;

    public ViewBayar(Context context) {
        this.context = context;
        listBayar = new ArrayList<>();
    }

    public void setListBayar(List<ModelData> listBayar) {
        this.listBayar = listBayar;
        notifyDataSetChanged();
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View v = LayoutInflater.from(context).inflate(R.layout.pembayaran, viewGroup, false);
        return new ViewHolder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder viewHolder, int i) {
        ModelData m = listBayar.get(i);


        viewHolder.tv_namaa.setText(m.getNama());
        viewHolder.tv_jenis.setText(m.getJenis());
        viewHolder.tv_status.setText(String.valueOf(m.getStatus()));
    }

    @Override
    public int getItemCount() {
        return listBayar.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        private TextView  tv_namaa, tv_jenis, tv_status;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);

            tv_namaa = itemView.findViewById(R.id.tv_namaa);
            tv_jenis = itemView.findViewById(R.id.tv_jenis);
            tv_status = itemView.findViewById(R.id.tv_status);
        }
    }
}

