import React, { useEffect } from "react";
import { useParams } from "react-router-dom";
import Layout from "../components/Layout";

export default function MemberPage() {
  let { name } = useParams();
  name = name.replace("_", " ");

  useEffect(() => {
    //call to database for member info
  }, []);

  return (
    <Layout>
      <h1>{name}</h1>
      <div>
        <p>Member content</p>
      </div>
    </Layout>
  );
}
