import PageBreadcrumb from "@/components/common/PageBreadCrumb";
import { useParams } from "react-router";
import { useGetMemberData } from "@/hooks/members/useGetMemberData";
import MemberMetaCard from "@/components/Members/MemberView/MemberMetaCard";
import MemberInfoCard from "@/components/Members/MemberView/MemberInfoCard";
import MemberAddressCard from "@/components/Members/MemberView/MemberAddressCard";

export default function MemberView() {

  const { member_id } = useParams();
  const { loading, data } = useGetMemberData(member_id!);

  if (loading) {
    return <div>Loading...</div>;
  }
  
  return (
    <>
      <PageBreadcrumb pageTitle="Member Details"  parentPage={{ name: "Members", link: "/members" }} />
      <div className="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
        <div className="space-y-6">
          <MemberMetaCard member={data} />
          <MemberInfoCard member={data} />
          <MemberAddressCard member={data} />
        </div>
      </div>
    </>
  );
}
