import { getMembers } from "@/services/member";
import { ApiResponse, MembersResponse, MemberStatus } from "@/typing/member";
import { useEffect, useState } from "react";

export const useGetMembers = (status: MemberStatus = "all") => {
  const [loading, setLoading] = useState(false);
  const [data, setData] = useState<MembersResponse>({} as MembersResponse);

  const fetchMembers = async (
    status: MemberStatus,
  ): Promise<ApiResponse<MembersResponse>> => {
    const members = await getMembers(status);
    return members;
  };

  useEffect(() => {
    setLoading(true);
    fetchMembers(status)
      .then(({ data }) => setData(data))
      .finally(() => setLoading(false));
  }, [status]);

  return { loading, data };
};
